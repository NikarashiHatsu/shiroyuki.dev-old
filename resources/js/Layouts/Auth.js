import { Link } from "@inertiajs/inertia-react";
import React from "react";
import Logo from './../../images/devsnote.svg';

export default function Auth({children}) {
    return (
        <div className="h-screen w-full py-20" data-theme="light">"
            <div className="max-w-lg mx-auto">
                <Link href={route('index')}>
                    <img
                        src={Logo}
                        className="w-24 h-24 mx-auto"
                    />
                </Link>
                <div className="max-w-sm mx-auto mt-4">
                    {children}
                </div>
            </div>
        </div>
    );
}