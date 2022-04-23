import React from "react";
import Guest from '@/Layouts/Guest';
import ReactMarkdown from 'react-markdown';
import { ArrowLeft, Eye, Chat } from'phosphor-react';
import { Head, Link } from "@inertiajs/inertia-react";

export default function Detail({ blog, latestBlogs, categories }) {
    return(
        <Guest
            latestBlogs={latestBlogs}
            categories={categories}
            tags={categories}
        >
            <Head>
                <meta name="author" content="Aghits Nidallah" />
                <meta name="title" content={blog.title} />
                <meta name="description" content={blog.description} />
                <meta name="keywords" content="shiroyuki, dev, shiroyuki.dev, hatsu, hatsu shiroyuki, hatsushiroyuki, blog, pengembangan, web, laravel, flutter, android, ios, react, vue, php, python, ruby, java, javascript, css, html, c, c++, c#, swift, kotlin, android, ios, react, vue, php, python, ruby, java, javascript, css, html, c, c++, c#, swift, kotlin" />
                <meta name="robots" content="index,follow" />

                <meta property="og:title" content={blog.title} />
                <meta property="og:type" content="article" />
                <meta property="og:image" itemProp="image" content={blog.thumbnail_url} />
                <meta property="og:image:alt" content={blog.description} />
                <meta property="og:url" content={route('show', blog.id)} />
                <meta property="og:description" content={blog.description} />
                <meta property="og:site_name" content="Shiroyuki.dev" />

                <meta name="twitter:card" content="summary_large_image" />
                <meta name="twitter:site:id" content="irlnidallah" />
                <meta name="twitter:creator:id" content="irlnidallah" />
                <meta name="twitter:title" content={blog.title} />
                <meta name="twitter:description" content={blog.description} />
            </Head>

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
                        alt={`Thumbnail dari ${blog.title}`}
                        src={blog.thumbnail_url}
                    />
                </div>
                <h1 className="mb-4">{blog.title}</h1>
                <div className="flex items-center mt-2">
                    <div className="flex items-center">
                        <Eye size={16} />
                        <span className="ml-2">
                            {blog.views_count}
                        </span>
                    </div>
                    <div className="w-1 h-1 bg-gray-500 rounded-full mx-4"></div>
                    <div className="flex items-center">
                        <Chat size={16} />
                        <span className="ml-2">0</span>
                    </div>
                </div>
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