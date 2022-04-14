import React from 'react';
import Guest from '@/Layouts/Guest';
import Post from '@/Components/Post';
import { Head } from '@inertiajs/inertia-react';
import DefaultBanner from './../../images/devsnote-default-banner.png';

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
            <Head>
                <meta name="author" content="Aghits Nidallah" />
                <meta name="title" content='Shiroyuki.dev, sebuah blog dan catatan pengembangan.' />
                <meta name="description" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
                <meta name="keywords" content="shiroyuki, dev, shiroyuki.dev, hatsu, hatsu shiroyuki, hatsushiroyuki, blog, pengembangan, web, laravel, flutter, android, ios, react, vue, php, python, ruby, java, javascript, css, html, c, c++, c#, swift, kotlin, android, ios, react, vue, php, python, ruby, java, javascript, css, html, c, c++, c#, swift, kotlin" />
                <meta name="robots" content="index,follow" />

                <meta property="og:title" content="Shiroyuki.dev" />
                <meta property="og:type" content="article" />
                <meta property="og:image" itemProp="image" content={DefaultBanner} />
                <meta property="og:image:alt" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
                <meta property="og:url" content={route('index')} />
                <meta property="og:description" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
                <meta property="og:site_name" content="Shiroyuki.dev" />

                <meta name="twitter:card" content="summary_large_image" />
                <meta name="twitter:site:id" content="irlnidallah" />
                <meta name="twitter:creator:id" content="irlnidallah" />
                <meta name="twitter:title" content="Shiroyuki.dev" />
                <meta name="twitter:description" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
            </Head>

            <div className='grid grid-cols-12 grid-flow-row gap-4'>
                {Blogs(blogs)}
            </div>
        </Guest>
    );
}
