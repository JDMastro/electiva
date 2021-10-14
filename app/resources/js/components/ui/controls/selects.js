
export function Select({ data, name, label, value, error = null, onChange, autofocus = true, className, onBlur }) {
    return (
        <div>
            <div className="form-floating">
                <select 
                id="floatingSelect" 
                aria-label="Floating label select example" 
                onBlur={onBlur} 
                className={error ? `${className} form-select is-invalid` : `${className} form-select`} 
                autoFocus={autofocus} onChange={onChange} 
                name={name} 
                value={value}>
                    <option>Open this select menu</option>
                    {data.map((d,i) =>
                      <option value={d.id} key={i}>{d.name}</option>
                    )}
                </select>
                <label htmlFor="floatingSelect">{label}</label>
            </div>
            {error && <div className="invalid-feedback">{error}</div>}
        </div>
    )
}
