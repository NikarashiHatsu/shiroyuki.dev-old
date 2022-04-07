import { Head, Link } from '@inertiajs/inertia-react';
import Logo from './../../images/devsnote.svg';
import React from 'react';
import SmallPost from '@/Components/SmallPost';
import Tag from '@/Components/Tag';

export default function Guest({ children }) {
    return (
        <>
            <Head>
                <title>Shiroyuki's Project Stash</title>
                <link rel="shortcut icon" href={Logo} type="image/x-icon" />
            </Head>

            <div className='w-full font-sans' data-theme="light">
                <div className='border-b'>
                    <div className='max-w-7xl mx-auto'>
                        <div className='flex py-4'>
                            <img
                                className='w-16 mr-2'
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
                    <div className='grid grid-cols-12 grid-flow-row gap-4'>
                        <div className='col-span-12 lg:col-span-9'>
                            {children}
                        </div>

                        <div className='col-span-12 lg:col-span-3'>
                            <form>
                                <div className='flex flex-col'>
                                    <label className='label'>
                                        <span className='label-text'>Pencarian</span>
                                    </label>
                                    <div className='input-group'>
                                        <input type="text" name='search' placeholder='Cari...' className='input input-bordered w-full' />
                                        <button className='btn btn-square btn-primary'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div className='flex flex-col mt-6'>
                                <label className='label'>
                                    <span className='label-text'>Kategori</span>
                                </label>
                                <ol class="list-inside">
                                    <li className='mt-2'>
                                        <Link>Kategori 1</Link>
                                    </li>
                                    <li className='mt-2'>
                                        <Link>Kategori 2</Link>
                                    </li>
                                    <li className='mt-2'>
                                        <Link>Kategori 3</Link>
                                    </li>
                                    <li className='mt-2'>
                                        <Link>Kategori 4</Link>
                                    </li>
                                    <li className='mt-2'>
                                        <Link>Kategori 5</Link>
                                    </li>
                                </ol>
                            </div>

                            <div className='flex flex-col mt-6'>
                                <label className='label'>
                                    <span className='label-text'>Post Terakhir</span>
                                </label>
                                <SmallPost />
                                <SmallPost />
                                <SmallPost />
                                <SmallPost />
                                <SmallPost />
                            </div>

                            <div className='flex flex-col mt-6'>
                                <label className='label'>
                                    <span className='label-text'>Tag</span>
                                </label>
                                <div className="flex flex-wrap">
                                    <Tag tag="Tag Testing 1" />
                                    <Tag tag="Testing Tag 2" />
                                    <Tag tag="3 Tag Testing" />
                                    <Tag tag="Testing 4 Tag" />
                                    <Tag tag="Tag 5 Testing" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
