import { useState } from "react"

export default function FAQ ({ children, question }) {
  const [isOpen, setIsOpen] = useState(false)
  return (
    <div className="faq border-2 p-2 my-2 cursor-pointer gap-12" onClick={() => setIsOpen(!isOpen)}>
      <div className="question">{question}</div>
      {isOpen && <div className="answer">{children}</div>}
    </div>
  )
}