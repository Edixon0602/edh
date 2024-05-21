var express = require('express');
var router = express.Router();
const fs = require('node:fs');
const zip = require('zip-a-folder')
console.log(zip)

/* GET users listing. */
router.post('/', function(req, res, next) {
  const selectedComponents = req.body.components
  selectedComponents.forEach((component, index) => {
    switch (component) {
      case 'Content':
        selectedComponents[index] = 'component-content.php'
      break

      case 'Single Image':
        selectedComponents[index] = 'component-single_image.php'
      break

      case 'Buttons':
        selectedComponents[index] = 'component-buttons.php'
      break

      case 'Carousel':
        selectedComponents[index] = 'component-carousel.php'
      break

      case 'Tabs':
        selectedComponents[index] = 'component-tabs.php'
      break

      case 'FAQs':
        selectedComponents[index] = 'component-faqs.php'
      break

      case 'Posts Grid':
        selectedComponents[index] = 'component-posts_grid.php'
      break

      default:
        break;
    }
    console.log(selectedComponents)
  })
  fs.cpSync('./routes/routesAssets/skinjectables/', './routes/routesAssets/themeName', { recursive: true })
  const folderPath = './routes/routesAssets/themeName/template-parts/components';
  const themeDir = fs.readdirSync(folderPath);
  themeDir.forEach((file, index) => {
    if (!selectedComponents.includes(file)) {
      fs.unlinkSync(folderPath + '/' + file)
    }
  })
  zip.zip('./routes/routesAssets/themeName/', './routes/routesAssets/themeName.zip', {compression: zip.COMPRESSION_LEVEL.medium})
  .then(() => {
    res.download('./routes/routesAssets/themeName.zip')
  })
});

module.exports = router;
