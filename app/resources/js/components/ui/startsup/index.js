import React, { useState } from "react";
import { FormikHelpers } from "formik";
import * as controls from "../controls/";
import { Form, UseForm } from "../controls/form";
import { startupInitialValues } from "../controls/values/";
import { validationSchemaStartup } from "../controls/schema/";

import { StartUpRequest } from "../../services/startupsService";
import { setFormikErrors } from "../controls/helper";
import { isEmptyObject } from "jquery";

export function Startups({ user, kind }) {

    const [selectedImage, setSelectedImage] = useState();
    const [currentImage, setcurrentImage] = useState({});
    const [msg, setmsg] = useState("");

    const onSubmit = async (startupInitialValues, FormikHelpers) => {
        startupInitialValues.userId = user.id
        const formData = new FormData();

        if (isEmptyObject(currentImage)) {
            StartUpRequest.save({
                name: startupInitialValues.name,
                userId: startupInitialValues.userId,
                kindStartupId: parseInt(startupInitialValues.kindStartupId, 10),
                img: null
            }).then(e => {
                setmsg("Save Successfully !")
                toastMessage();
                window.location.replace("/");
            }).catch(e => {
                setFormikErrors(e.response.data.errors, FormikHelpers.setFieldError)
                setmsg("Something went wrong !")
                toastMessage();

            })
        } else {
            formData.append("name", startupInitialValues.name)
            formData.append("userId", startupInitialValues.userId)
            formData.append("kindStartupId", parseInt(startupInitialValues.kindStartupId, 10))
            formData.append("img", currentImage)

            StartUpRequest.save(formData).then(e => {
                setmsg("Save Successfully !")
                toastMessage();
                window.location.replace("/");
            }).catch(e => {
                setFormikErrors(e.response.data.errors, FormikHelpers.setFieldError)

                setmsg("Something went wrong !")

                toastMessage();

            })
        }


    }

    const formik = UseForm(startupInitialValues, validationSchemaStartup, onSubmit)

    function handleImg(e) {
        if (e.target.files && e.target.files.length > 0) {
            setSelectedImage(URL.createObjectURL(e.target.files[0]));
            setcurrentImage(e.currentTarget.files[0])
        }


        setcurrentImage(e.currentTarget.files[0])

    }

    function toastMessage() {
        var options = { animation: true, delay: 2000 }

        var toastHTMLElement = document.getElementById('EpicToast');

        var toastElement = new bootstrap.Toast(toastHTMLElement, options);

        toastElement.show();
    }



    return (
        <div className="container container-fluid">

            <Form className="p-4" onSubmit={formik.handleSubmit}>
                <div className="row">
                    <div className="col-md-8">
                        <controls.Input
                            autofocus
                            className="mt-3"
                            error={formik.errors.name}
                            label="Name *"
                            name="name"
                            onChange={formik.handleChange}
                            type="text"
                            value={formik.values.name}
                        />

                        {
                            kind.length > 0 ? (
                                <controls.Select
                                    autofocus={false}
                                    className="mt-3"
                                    error={formik.errors.kindStartupId}
                                    label="Kind of startup *"
                                    name="kindStartupId"
                                    onChange={formik.handleChange}
                                    value={formik.values.kindStartupId}
                                    data={kind}

                                />
                            ) : (<div></div>)
                        }

                        <controls.Input
                            autofocus={false}
                            className="mt-3"
                            error={formik.errors.img}
                            label=" "
                            name="img"
                            onChange={handleImg}
                            type="file"
                            value={formik.values.img}
                            accept="image/*"
                            id="profileimage"
                        />
                    </div>

                    <div className="col-md-4">
                        <img height="28px" className="img-fluid img-thumbnail" src={selectedImage != null ? selectedImage : "http://127.0.0.1:8000/img/ggg.png"} />
                    </div>



                    <controls.Buttons
                        className="mt-3"
                        disabled={false}
                        text="Enviar"
                        type='submit'
                    />

                </div>
            </Form>

            <controls.Toast msg={msg}
            />
        </div>
    );
}