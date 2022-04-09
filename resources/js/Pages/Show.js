import React from "react";
import Guest from '@/Layouts/Guest';
import ReactMarkdown from 'react-markdown';
import { ArrowLeft } from'phosphor-react';
import { Link } from "@inertiajs/inertia-react";

export default function Detail({ blog, latestBlogs, categories }) {
    return(
        <Guest
            latestBlogs={latestBlogs}
            categories={categories}
            tags={categories}
        >
            <div className="prose prose-slate prose-h1:leading-snug">
                <Link
                    className="btn btn-ghost mb-4"
                    href={route('index')}
                >
                    <ArrowLeft size={16} />
                    <span className="ml-2">
                        Kembali ke Beranda
                    </span>
                </Link>
                <div className="aspect-w-16 aspect-h-10 mb-8">
                    <img
                        className="w-full h-full rounded object-cover m-0"
                        src={blog.thumbnail_url}
                    />
                </div>
                <h1 className="mb-4">{blog.title}</h1>
                <div className="flex items-center">
                    <span>{blog.user.name}</span>
                    <div className="w-1 h-1 mx-2 rounded-full bg-gray-500"></div>
                    <span>{blog.formatted_date}</span>
                </div>
                <ReactMarkdown
                    children={blog.description}
                />
            </div>
        </Guest>
    );
}