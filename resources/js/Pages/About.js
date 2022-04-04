import React from "react";

export default function About(props) {
    return (
        <>
            <h1>About</h1>
            <p>
                This is the about page.
            </p>
            <p>
                This page is a static page, it is rendered directly via Route.
                So no controller is needed.
            </p>
        </>
    );
}