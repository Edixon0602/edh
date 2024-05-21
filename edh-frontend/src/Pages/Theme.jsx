import Components from "../Components"

export default function Theme() {

  const handleGenerateSubmit = (e) => {
    e.preventDefault()
    const fetchUrl = "http://localhost:3000/theme"
    const checkedValues = e.target.querySelectorAll('input:checked')
    const selectedComponents = []
    checkedValues.forEach((checkbox) => {
      selectedComponents.push(checkbox.value)
    })
    console.log(selectedComponents)
    fetch(fetchUrl, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        components: selectedComponents
      })
    })
    .then ((res) => res.blob())
    .then((blob) => {
      let tempAnchor = document.createElement('a');
      tempAnchor.download = 'mytheme.zip';
      tempAnchor.style.display = 'none';
      document.body.appendChild(tempAnchor);
      tempAnchor.href = window.URL.createObjectURL(blob);
      tempAnchor.click();
      document.body.removeChild(tempAnchor);
    })
  }
  return (
    <div>
      <h1>Theme Boilerplate Generator</h1>
      <form action="" onSubmit={ (e) => handleGenerateSubmit(e)}>
        <p>Components</p>
        <div className="components flex gap-5">
        {
          Components.map((component, index) => {
            return (
              <label htmlFor={component.id} key={index}>
                {component.name}
                <input type="checkbox" name={component.id} id={component.id} className="mx-4" value={component.name} />
              </label>
            )
          })
        }
        </div>
        <button type="submit">Generate</button>
      </form>
    </div>
  )
}