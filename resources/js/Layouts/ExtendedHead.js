import React from 'react';
import { Head } from "@inertiajs/inertia-react";

const ExtendedHead = ({ title, children }) => {
    return (
        <Head>
            <title>{title ? `${title} - Shiroyuki Dev` : 'My App'}</title>
            {children}
        </Head>
    );
}

export default ExtendedHead;