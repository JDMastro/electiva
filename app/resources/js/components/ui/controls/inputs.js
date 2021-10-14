
export function Input({id = "floatingInputValue" ,accept=null, name, label, value, error=null, onChange, autofocus = true, type, className, onBlur }) {
    return (
        <div className="form-floating">
            <input id={id} accept={accept} type={type} onBlur={onBlur} className={error ? `${className} form-control is-invalid` : `${className} form-control`} autoFocus={autofocus} onChange={onChange} name={name} placeholder={label} value={value} />
            <label htmlFor="floatingInputValue">{label}</label>
            { error && <div className="invalid-feedback">{error}</div> }
        </div>
    )
}