export default function Home() {
  return (
    <>
      <ul className="flex flex-wrap justify-center">
        <li className="w-1/2 p-5 border-2 text-center"><a href="/faqs">Frequently asked questions</a></li>
        <li className="w-1/2 p-5 border-2 text-center"><a href="/theme">Theme boilerplate generator</a></li>
        <li className="w-1/2 p-5 border-2 text-center"><a href="/plugin">Plugin boilerplate generator</a></li>
        <li className="w-1/2 p-5 border-2 text-center"><a>Placeholder</a></li>
      </ul>
    </>
  )
}