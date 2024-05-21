// Desktop submenus
function handleSubmenus() {
  let itemsWithChilds = document.querySelectorAll('.menu-item-has-children > a');
  itemsWithChilds.forEach(el => {
    el.addEventListener('click', (e) => {
      e.preventDefault();
      let submenu = el.closest('.menu-item-has-children').querySelector('.sub-menu');
      submenu.classList.toggle('active');
    })
  })
}

// Responsive menu
function responsiveNavMenu() {
  let menuToggler = document.getElementById('menu-toggler'),
    menuContainer = document.querySelector('.menu-container');
  menuToggler.addEventListener('click', (e) => {
    menuToggler.classList.toggle('active');
    menuContainer.classList.toggle('active');
  })
  if (window.innerWidth <= 1180) {
    let header = document.getElementById('masthead'),
      submenus = document.querySelectorAll('.menu-item-has-children .sub-menu'),
      bookingButtonMobile = document.createElement('div'),
      bookingButtonAnchor = document.createElement('a');
    submenus.forEach(el => {
      el.classList.add('active');
    })
    // Create booking button for mobile devices
    bookingButtonMobile.innerText = 'Book a Consultation';
    bookingButtonAnchor.setAttribute('class', 'booking-button-mobile text-center');
    bookingButtonAnchor.href = document.querySelector('.book-now-button a').href;
    bookingButtonAnchor.appendChild(bookingButtonMobile);
    header.appendChild(bookingButtonAnchor);
  }
}

// Clone Social Media icons on responsive menu
function createSocialMediaIconsOnResponsiveMenu() {
  let target = document.querySelector('#site-navigation .menu-container');
  let socialMediaIcons = document.querySelector('#colophon .mobile-footer .social-media-icons').cloneNode(true);
  socialMediaIcons.classList.add('w-100');
  target.appendChild(socialMediaIcons);
}

// Handle FAQs grids component
function handleFaqGridComponent() {
  let faqsItems = document.querySelectorAll('.faqs > article:not(.image):not(.spacer)');
  faqsItems.forEach(el => {
    let titleHeight = parseInt(el.querySelector('.card-title').offsetHeight),
      contentHeight = parseInt(el.querySelector('.card-content').offsetHeight),
      itemPadding = parseInt(getComputedStyle(el, null).getPropertyValue('padding-top')) * 2,
      itemHeight = Math.max(titleHeight, contentHeight);
    el.style.minHeight = `${itemHeight + itemPadding + 10}px`;
    el.querySelector('.card-content').classList.add('d-none');
    el.addEventListener('click', () => {
      let title = el.querySelector('.card-title'),
        content = el.querySelector('.card-content');
      title.classList.toggle('hidden');
      content.classList.toggle('hidden');
      setTimeout(() => {
        title.classList.toggle('d-none');
        content.classList.toggle('d-none');
      }, 300);
    })
  })
}

// Mobile horizontal tabs
function responsiveHorizontalTabs(tabs) {
  let activeItem = tabs.querySelector('.horizontal-tabs .nav-link.active');
  let tabsSelectors = tabs.querySelectorAll('.horizontal-tabs .nav-link');
  let content = tabs.querySelector('.horizontal-tabs .tab-content');
  insertAfter(content, activeItem);
  tabsSelectors.forEach(el => {
    el.addEventListener('click', (e) => {
      insertAfter(content, e.target);
    })
  })
}

// Function to build each item (or display the no more posts message) on the fetch response for AJAX load more button
function buildItemOnLoadMore(item, target, noMorePosts = false) {
  if (noMorePosts === false) {
    let fragment = document.createDocumentFragment();
    article = document.createElement('article'),
      thumbnailContainer = document.createElement('div'),
      content = document.createElement('div'),
      thumbnail = document.createElement('img'),
      title = document.createElement('h4'),
      anchor = document.createElement('a');
    article.setAttribute('class', 'item my-4 col-12 col-md-6 col-xl-4');
    thumbnailContainer.setAttribute('class', 'thumbnail');
    title.setAttribute('class', 'title mb-3');
    content.setAttribute('class', 'content mt-4');
    anchor.setAttribute('class', 'read-more');
    thumbnail.src = item._embedded['wp:featuredmedia']['0'].source_url;
    title.innerText = item.title.rendered;
    anchor.href = item.link;
    anchor.innerText = 'Read More';
    thumbnailContainer.appendChild(anchor.cloneNode());
    thumbnailContainer.querySelector('a').appendChild(thumbnail);
    content.appendChild(title);
    if (item.excerpt.rendered) {
      let excerpt = document.createElement('p');
      excerpt.setAttribute('class', 'excerpt');
      excerpt.innerHTML = item.excerpt.rendered;
      content.appendChild(excerpt);
    }
    content.appendChild(anchor);
    article.appendChild(thumbnailContainer);
    article.appendChild(content);
    fragment.appendChild(article);
    target.appendChild(fragment);
  } else {
    let message = document.createElement('p');
    message.setAttribute('class', 'bg-primary text-white text-center p-3 mt-4 fade-in');
    message.innerText = 'No more resources to show...';
    target.closest('.posts-grid-container').appendChild(message);
    setTimeout(() => {
      message.classList.remove('fade-in');
      message.classList.add('fade-out');
      message.addEventListener('animationend', (e) => e.target.remove());
    }, 3000)
  }
}

// Request posts by fetch on load more button for posts grid component
function loadMorePosts(targetContainer, target, requestNumber) {
  targetContainer = target.closest('.posts-grid-container').querySelector('.row');
  let offset = targetContainer.closest('.posts-grid-container').dataset.offset,
    postNumber = offset;
  const headers = new Headers({
    'Content-Type': 'application/json',
    'X-WP-Nonce': ajax_var.nonce
  });
  offset = offset * requestNumber;
  fetch(`${ajax_var.url}/?offset=${offset}&per_page=${postNumber}&_embed`, {
    method: 'get',
    headers: headers,
    credentials: 'same-origin'
  })
    .then(response => response.json())
    .then(data => {
      if (data.length > 0) {
        data.forEach(el => {
          buildItemOnLoadMore(el, targetContainer);
        });
      } else {
        buildItemOnLoadMore(null, targetContainer, true);
      }
    });
}

// Reorder the social feed and add the Facebook button
function reorderSocialFeed () {
  let sbiImages = document.getElementById('sbi_images'),
    sbiButtons = document.getElementById('sbi_load'),
    instagramButton = document.querySelector('.sbi_follow_btn.sbi_custom'),
    facebookButton = document.createElement('span');
    facebookButton.setAttribute('class', 'sbi_follow_btn sbi_custom');
    facebookButton.innerHTML = '<a href="https://www.facebook.com/skinjectables/" style="background: rgb(213,139,161); display: flex; align-items: center;" data-button-hover="#D58BA1" target="_blank" rel="nofollow noopener"><img src="https://skinjectables.ca/wp-content/uploads/2022/07/facebook.png" style="max-height: 15px; margin-right: 7px;"><span>Follow on Facebook</span><br></a>';

  insertAfter(sbiImages, sbiButtons);
  insertAfter(facebookButton, instagramButton);
}

function insertAfter(newNode, referenceNode) {
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

// Functions calls
window.addEventListener('load', () => {
  if (document.querySelector('.menu')) {
    handleSubmenus();
  }
  if (document.getElementById('menu-toggler')) {
    responsiveNavMenu();
  }
  if (window.innerWidth <= 1180) {
    createSocialMediaIconsOnResponsiveMenu();
  }
  if (document.querySelector('.faqs')) {
    handleFaqGridComponent();
  }
  if (document.querySelector('.horizontal-tabs') && window.innerWidth <= 1024) {
    let horizontalTabs = document.querySelectorAll('.horizontal-tabs');
    horizontalTabs.forEach(el => {
      responsiveHorizontalTabs(el);
    })
  }
  if (document.getElementsByClassName('load-more-btn')) {
    let loadMoreBtn = document.querySelectorAll('.load-more-btn');
    loadMoreBtn.forEach(el => {
      let requestNumber = 1;
      el.addEventListener('click', (e) => {
        e.preventDefault();
        loadMorePosts('.posts-grid-container .row', e.target, requestNumber);
        requestNumber++;
      })
    })
  }
	if (document.getElementById('sb_instagram')) {
    reorderSocialFeed();
  }
})