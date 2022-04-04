import { Link } from "@inertiajs/inertia-react";
import React from "react";

export default function CustomLayout({ children }) {
    return (
        <main className="mx-auto max-w-xl">
            <header className="border-b py-4 mb-4 fixed top-0 bg-white max-w-xl w-full shadow px-4">
                <Link href="/persistent-page-1">Page 1</Link>
                <Link href="/persistent-page-2" className="ml-4">Page 2</Link>
            </header>
            <article className="pt-20">
                { children }
            </article>
        </main>
    );
}