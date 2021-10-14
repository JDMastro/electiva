import { useFormik } from "formik";

export function UseForm(initialFValues , validationSchema , onsubmit){
    
    const formik = useFormik({
        initialValues : initialFValues,
        validateOnBlur : true,
        onSubmit : onsubmit,
        validationSchema : validationSchema
    })
    return formik
}

export function Form(props){
    const { className, children, onSubmit} = props

    return(
        <form className={className} onSubmit={onSubmit} >
            { children }
        </form>
    )
}