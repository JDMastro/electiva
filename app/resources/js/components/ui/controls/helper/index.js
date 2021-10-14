export const setFormikErrors = (errorObject, setErrorFunction) => {
    const errors = Object.keys(errorObject);
    errors.map((item) => {
      setErrorFunction(item, errorObject[item].join('\r\n'));
    });
  };