import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { Tag, Eye, Chat } from 'phosphor-react';

export default function SmallPost({ slug, thumbnail, title, author, formattedDate, viewsCount }) {
    return(
        <Link
            href={route('show', slug)}
            className="flex group"
            preserveScroll={true}
        >
            <img
                src={thumbnail}
                alt={`Thumbnail dari ${title}`}
                className='w-24 h-24 rounded object-cover'
            />
            <div className="flex flex-col ml-2">
                <h6 className="transition-colors duration-300 ease-in-out font-semibold line-clamp-2 group-hover:text-primary">{title}</h6>
                <div className="flex items-center mt-1">
                    <div className="flex">
                        <Eye size={14} />
                        <span className="text-xs ml-1">
                            {viewsCount}
                        </span>
                    </div>
                    <div className="w-1 h-1 bg-gray-500 rounded-full mx-2"></div>
                    <div className="flex">
                        <Chat size={14} />
                        <span className="text-xs ml-1">0</span>
                    </div>
                </div>
                <p className="text-sm my-1 text-gray-500">{author}</p>
                <p className="text-sm text-gray-500">{formattedDate}</p>
            </div>
        </Link>
    );
}