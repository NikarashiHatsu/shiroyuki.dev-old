import { Head, Link, useForm } from '@inertiajs/inertia-react';
import Logo from './../../images/devsnote.svg';
import React from 'react';
import SmallPost from '@/Components/SmallPost';

function LatestBlogs(latestBlogs) {
    if (latestBlogs.length == 0) {
        return "Belum ada blog yang ditulis.";
    }

    return latestBlogs.map(blog =>
        <div
            className='my-2'
            key={`Latest Blog Loop ${blog.id}`}
        >
            <SmallPost
                key={`Latest Blog ${blog.id}`}
                slug={blog.slug}
                author={blog.user.name}
                title={blog.title}
                formattedDate={blog.formattedDate}
                thumbnail={blog.thumbnail_url}
            />
        </div>
    );
}

function Categories(categories) {
    if (categories.length == 0) {
        return "Belum ada kategori yang dibuat.";
    }

    return categories.map(category =>
        <li
            className='mt-2'
            key={`Category Loop ${category.id}`}
        >
            <Link
                href={route('category', category.name)}
                className='transition-colors duration-300 ease-in-out flex items-center justify-between text-sm hover:text-primary'
                key={`Category Link ${category.id}`}
                preserveScroll={true}
            >
                { category.name } ({ category.blogs_count })
            </Link>
        </li>
    );
}

export default function Guest({ children, latestBlogs, categories, searchQuery }) {
    const { data, get, setData } = useForm({
        'query': searchQuery,
    });

    function handleSearch(e) {
        e.preventDefault();

        get(route('search', data.query), {
            preserveScroll: true
        });
    }

    return (
        <>
            <Head>
                <title>Shiroyuki's Project Stash</title>
                <link rel="shortcut icon" href={Logo} type="image/x-icon" />
            </Head>

            <div className='w-full font-sans px-6 2xl:px-0' data-theme="light">
                <div className='border-b'>
                    <div className='max-w-7xl mx-auto'>
                        <div className='flex py-4'>
                            <img
                                className='w-16 mr-2'
                                alt='Logo shiroyuki.dev'
                                src={Logo}
                            />
                            <div className='flex flex-col justify-center'>
                                <h6 className='font-semibold'>
                                    Shiroyuki.dev
                                </h6>
                                <p className='text-sm'>
                                    A Developer's Note
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div className='max-w-7xl mx-auto py-6'>
                    <div className='grid grid-cols-12 grid-flow-row gap-6'>
                        <div className='col-span-12 lg:col-span-9'>
                            {children}
                        </div>

                        <div className='col-span-12 lg:col-span-3'>
                            <form onSubmit={handleSearch}>
                                <div className='flex flex-col'>
                                    <label className='label'>
                                        <span className='label-text uppercase font-semibold text-gray-500'>Pencarian</span>
                                    </label>
                                    <div className='input-group'>
                                        <input
                                            type="text"
                                            name='search'
                                            placeholder='Cari...'
                                            className='input input-bordered w-full'
                                            value={data.query}
                                            onChange={e => setData('query', e.target.value)}
                                        />
                                        <button className='btn btn-square btn-primary'>
                                            <span className='sr-only'>
                                                Cari
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div className='flex flex-col mt-6'>
                                <label className='label'>
                                    <span className='label-text uppercase font-semibold text-gray-500'>Kategori</span>
                                </label>
                                <ol className="list-inside">
                                    { Categories(categories) }
                                </ol>
                            </div>

                            <div className='flex flex-col mt-6'>
                                <label className='label'>
                                    <span className='label-text uppercase font-semibold text-gray-500'>Blog Terakhir</span>
                                </label>
                                { LatestBlogs(latestBlogs) }
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
