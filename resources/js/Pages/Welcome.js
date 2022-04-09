import React from 'react';
import Guest from '@/Layouts/Guest';
import Post from '@/Components/Post';

function Blogs(blogs) {
    if (blogs.length == 0) {
        return "Belum ada blog yang dipublikasikan.";
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

export default function Welcome({ blogs, latestBlogs, categories }) {
    return (
        <Guest
            latestBlogs={latestBlogs}
            categories={categories}
            tags={categories}
        >
            <div className='grid grid-cols-12 grid-flow-row gap-4'>
                {Blogs(blogs)}
            </div>
        </Guest>
    );
}
