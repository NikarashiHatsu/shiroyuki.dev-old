import Post from "@/Components/Post";
import Guest from "@/Layouts/Guest";
import { Link } from "@inertiajs/inertia-react";
import { ArrowLeft } from "phosphor-react";
import React from "react";

function Blogs(blogs) {
    if (blogs.length == 0) {
        return <div className="col-span-12">Belum ada blog dengan kategori ini</div>;
    }

    return blogs.map(blog =>
        <div
            className='col-span-12 sm:col-span-6 md:col-span-4'
            key={`Blog Loop ${blog.id}`}
        >
            <Post
                key={`Blog Post ${blog.id}`}
                slug={blog.slug}
                author={blog.user.name}
                title={blog.title}
                category={blog.category}
                formattedDate={blog.formattedDate}
                thumbnail={blog.thumbnail_url}
                description={blog.description}
            />
        </div>
    );
}

export default function Search({ blogs, searchQuery, latestBlogs, categories }) {
    return(
        <Guest
            latestBlogs={latestBlogs}
            categories={categories}
            tags={categories}
            searchQuery={searchQuery}
        >
            <Link
                className="btn btn-ghost mb-4"
                href={route('index')}
            >
                <ArrowLeft size={16} />
                <span className="ml-2">
                    Kembali ke Beranda
                </span>
            </Link>

            <h1 className="mb-4 font-bold text-4xl">
                Pencarian: {searchQuery}
            </h1>

            <div className='grid grid-cols-12 grid-flow-row gap-4'>
                {Blogs(blogs)}
            </div>
        </Guest>
    );
}