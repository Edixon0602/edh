export default function Theme () {
  return (
    <div>
      <h1>Theme Boilerplate Generator</h1>
      <form action="">
      <p>Components</p>
      <label htmlFor="singleImage"> Single image
        <input type="checkbox" name="singleImage" id="singleImage" className="mx-2" />
      </label>
      <label htmlFor="singleImage"> Single video
        <input type="checkbox" name="singleVideo" id="singleVideo" className="mx-2" />
      </label>
      </form>
    </div>
  )
}