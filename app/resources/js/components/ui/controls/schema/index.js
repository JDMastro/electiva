import * as yup from "yup";

export const validationSchemaStartup = yup.object({

    name: yup.string().min(3, "Please enter your real name").required("Name is required!"),
  
    kindStartupId: yup.number().required('Kind of startup is required!'),
  
  })