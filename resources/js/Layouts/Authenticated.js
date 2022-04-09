import React from 'react';
import { Head, Link, usePage } from '@inertiajs/inertia-react';
import Logo from './../../images/devsnote.svg';
import { SignOut, House, Gauge, Gear, Note, Tag, ChatTeardropText, Users, List, Plus, ArrowLeft } from 'phosphor-react';
import Alert from '@/Components/Alert';

export default function Authenticated({ auth, header, headerPreAction, headerPreActionLink, headerPostAction, headerPostActionLink, children }) {
    const { alert } = usePage().props;
    const { component } = usePage();

    return (
        <>
            <Head>
                <meta name='description' content="Developer's Note Dashboard" />
                <link rel="shortcut icon" href={Logo} type="image/x-icon" />
            </Head>

            <div className='drawer drawer-mobile bg-base-100' data-theme="light">
                <input id="drawer" type="checkbox" className='drawer-toggle' />
                <div className='drawer-content'>
                    <div className='flex navbar bg-base-100 border-b justify-between'>
                        <div className='block lg:hidden'>
                            <label htmlFor="drawer" className='btn btn-square btn-ghost'>
                                <List size={16} />
                            </label>
                        </div>
                        {headerPreAction && (
                            <Link
                                href={headerPreActionLink}
                                className="btn btn-ghost"
                            >
                                <ArrowLeft size={16} />
                                <span className='ml-2'>
                                    {headerPreAction}
                                </span>
                            </Link>
                        )}
                        <h5 className='font-semibold text-lg mx-4'>
                            {header}
                        </h5>
                        {headerPostAction && (
                            <Link
                                href={headerPostActionLink}
                                className="btn btn-ghost"
                            >
                                <Plus size={16} />
                                <span className='ml-2'>
                                    {headerPostAction}
                                </span>
                            </Link>
                        )}
                    </div>

                    <main className='p-6'>
                        {alert.message && (
                            <Alert
                                type={alert.type}
                                message={alert.message}
                            />
                        )}

                        <div>
                            {children}
                        </div>
                    </main>
                </div>
                <div className='drawer-side border-r'>
                    <label htmlFor="drawer" className='drawer-overlay'></label>
                    <div className='overflow-y-auto w-80 bg-base-200'>
                        <div className='border-b sticky top-0 px-3 py-3 z-50 backdrop-blur'>
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
                                <Link
                                    href={ route('dashboard.index') }
                                    className={ component === 'Dashboard' ? 'active' : '' }
                                >
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
                                <Link
                                    href={ route('dashboard.category.index') }
                                    className={ component.startsWith('Category') ? 'active' : '' }
                                >
                                    <Tag size={16} />
                                    <span>
                                        Kategori
                                    </span>
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href={ route('dashboard.blog.index') }
                                    className={ component.startsWith('Blog') ? 'active' : '' }
                                >
                                    <Note size={16} />
                                    <span>
                                        Blog
                                    </span>
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href={ route('dashboard.comment.index') }
                                    className={ component.startsWith('Comment') ? 'active' : '' }
                                >
                                    <ChatTeardropText size={16} />
                                    <span>
                                        Komentar
                                    </span>
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href={ route('dashboard.user.index') }
                                    className={ component.startsWith('User') ? 'active' : '' }
                                >
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
                                <Link
                                    href={ route('dashboard.setting.index') }
                                    className={ component.startsWith('Setting') ? 'active' : '' }
                                >
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
