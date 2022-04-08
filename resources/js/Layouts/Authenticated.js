import React, { useState } from 'react';
import { Head, Link } from '@inertiajs/inertia-react';
import Logo from './../../images/devsnote.svg';
import { SignOut, House, Gauge, Gear, Note, Tag, ChatTeardropText, Users, List } from 'phosphor-react';

export default function Authenticated({ auth, header, children }) {
    return (
        <>
            <Head>
                <meta name='description' content="Developer's Note Dashboard" />
                <link rel="shortcut icon" href={Logo} type="image/x-icon" />
            </Head>

            <div className='drawer drawer-mobile' data-theme="light">
                <input id="drawer" type="checkbox" className='drawer-toggle' />
                <div className='drawer-content'>
                    <div className='flex md:hidden navbar bg-base-100'>
                        <div className='flex-none'>
                            <label htmlFor="drawer" className='btn btn-square btn-ghost'>
                                <List size={16} />
                            </label>
                        </div>
                    </div>

                    <main className='p-6'>
                        <h5 className='font-semibold text-lg'>
                            {header}
                        </h5>
                        <div>
                            {children}
                        </div>
                    </main>
                </div>
                <div className='drawer-side border-r'>
                    <label htmlFor="drawer" className='drawer-overlay'></label>
                    <div className='overflow-y-auto w-80 bg-white'>
                        <div className='border-b sticky top-0 border-r px-3 py-3 z-50 backdrop-blur'>
                            <Link
                                className='flex items-center'
                                href={ route('dashboard.index') }
                            >
                                <img src={Logo} className='w-12 h-12' />
                                <div className='ml-2 flex flex-col'>
                                    <span className='text-sm'>
                                        Shiroyuki.dev
                                    </span>
                                    <span className='text-xs'>
                                        A Developer's Note
                                    </span>
                                </div>
                            </Link>
                        </div>

                        <ul className='menu p-4 text-base-content'>
                            <li>
                                <Link href={ route('index') }>
                                    <House size={16} />
                                    <span>
                                        Homepage
                                    </span>
                                </Link>
                            </li>
                            <li>
                                <Link href={ route('dashboard.index') }>
                                    <Gauge size={16} />
                                    <span>
                                        Dashboard
                                    </span>
                                </Link>
                            </li>

                            <li className='menu-title mt-4'>
                                <span>
                                    Data Utama
                                </span>
                            </li>
                            <li>
                                <Link href={ route('dashboard.category.index') }>
                                    <Tag size={16} />
                                    <span>
                                        Kategori
                                    </span>
                                </Link>
                            </li>
                            <li>
                                <Link>
                                    <Note size={16} />
                                    <span>
                                        Blog
                                    </span>
                                </Link>
                            </li>
                            <li>
                                <Link>
                                    <ChatTeardropText size={16} />
                                    <span>
                                        Komentar
                                    </span>
                                </Link>
                            </li>
                            <li>
                                <Link>
                                    <Users size={16} />
                                    <span>
                                        Pengguna
                                    </span>
                                </Link>
                            </li>

                            <li className='menu-title mt-4'>
                                <span>
                                    User Control
                                </span>
                            </li>
                            <li>
                                <Link>
                                    <Gear size={16} />
                                    <span>
                                        Pengaturan
                                    </span>
                                </Link>
                            </li>
                            <li>
                                <Link
                                    as='button'
                                    className='hover:bg-red-500 hover:text-white'
                                    href={ route('logout') }
                                    method='POST'
                                >
                                    <SignOut size={16} />
                                    <span>
                                        Keluar
                                    </span>
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </>
    );
}
