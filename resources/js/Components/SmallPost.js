import { Link } from "@inertiajs/inertia-react";
import React from "react";

export default function SmallPost({ slug, thumbnail, title, author, formattedDate }) {
    return(
        <Link
            href={route('show', slug)}
            className="flex group"
            preserveScroll={true}
        >
            <img src={thumbnail} className='w-24 h-24 rounded object-cover' />
            <div className="flex flex-col ml-2">
                <h6 className="transition-colors duration-300 ease-in-out font-semibold line-clamp-2 group-hover:text-primary">{title}</h6>
                <p className="text-sm my-1 text-gray-500">{author}</p>
                <p className="text-sm text-gray-500">{formattedDate}</p>
            </div>
        </Link>
    );
}