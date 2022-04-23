import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { Tag, Eye, Chat } from 'phosphor-react';

export default function Post({ author, slug, thumbnail, title, description, category, formattedDate, viewsCount }) {
    return(
        <Link
            href={route('show', slug)}
            className="flex flex-col group border rounded"
            preserveScroll={true}
        >
            <div className="relative">
                <div className="aspect-w-16 aspect-h-10">
                    <img
                        src={thumbnail}
                        alt={`Thumbnail dari ${title}`}
                        className='w-full h-full rounded-t'
                    />
                </div>
                <div className="absolute bottom-0 left-0 p-2">
                    <div className="bg-white/75 text-sm p-1 rounded flex items-center backdrop-blur">
                        <Tag size={14} />
                        <span className="ml-1">
                            {category}
                        </span>
                    </div>
                </div>
            </div>
            <div className="flex flex-col p-4">
                <h6 className="transition-colors duration-300 ease-in-out font-semibold line-clamp-2 group-hover:text-primary">
                    {title}
                </h6>
                <div className="flex items-center mt-2">
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
                <div className="flex items-center text-sm mt-2 mb-1 text-gray-500">
                    <span>
                        {author}
                    </span>
                    <div className="w-1 h-1 bg-gray-500 rounded-full mx-2"></div>
                    <span>
                        {formattedDate}
                    </span>
                </div>
                <p className="text-sm my-1 line-clamp-3 leading-normal whitespace-pre-line">
                    {description}
                </p>
            </div>
        </Link>
    );
}