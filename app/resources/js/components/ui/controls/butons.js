export function Buttons({ className, disabled=false, onClick, text, type }){
    return(
        <button className={className} disabled={disabled} onClick={onClick} type={type}> {text} </button>
    )
}