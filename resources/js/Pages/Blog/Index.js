import Authenticated from "@/Layouts/Authenticated";
import { Head, Link } from "@inertiajs/inertia-react";
import { Pencil, Trash } from 'phosphor-react';
import React from "react";

function Blogs(blogs) {
    if (blogs.length == 0) {
        return (
            <tr className="border-t">
                <td colSpan="8" className="text-center">
                    Belum ada blog
                </td>
            </tr>
        );
    }

    return blogs.map((blog, index) => (
        <tr key={blog.id} className="border-t">
            <th>{index + 1}</th>
            <td>{blog.user.name}</td>
            <td>
                <div className="aspect-w-16 aspect-h-10">
                    <a href={blog.thumbnail_url} target="_blank">
                        <img
                            className="w-full h-full border rounded object-cover"
                            src={blog.thumbnail_url}
                        />
                    </a>
                </div>
            </td>
            <td>
                <p className="break-words whitespace-pre-wrap line-clamp-5">
                    {blog.title}
                </p>
            </td>
            <td>
                <p className="break-words whitespace-pre-wrap line-clamp-5">
                    {blog.description}
                </p>
            </td>
            <td>0 {blog.views_count} pembaca</td>
            <td>{blog.comments_count} komentar</td>
            <td>
                <Link
                    href={ route('dashboard.blog.edit', blog.id) }
                    className="btn btn-success btn-sm"
                >
                    <Pencil size={16} />
                    <span className="ml-2">
                        Edit
                    </span>
                </Link>
                {
                    blog.comments_count == 0
                        ? <Link
                                as="button"
                                href={ route('dashboard.blog.destroy', blog.id) }
                                className="btn btn-error btn-sm ml-2"
                                method="delete"
                            >
                                <Trash size={16} />
                                <span className="ml-2">
                                    Hapus
                                </span>
                            </Link>
                        : ``
                }
            </td>
        </tr>
    ));
}

export default function Index(props) {
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header="Blog"
            headerPostAction={`Tambah`}
            headerPostActionLink={route('dashboard.blog.create')}
        >
            <Head title="Blog" />

            <div className="overflow-x-auto">
                <table className="table table-fixed table-compact w-full mt-6">
                    <thead>
                        <tr>
                            <th width={50}>No</th>
                            <th width={150}>Penulis</th>
                            <th width={200}>Thumbnail</th>
                            <th width={200}>Judul</th>
                            <th width={500}>Deskripsi</th>
                            <th width={150}>View</th>
                            <th width={150}>Komentar</th>
                            <th width={250}>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        { Blogs(props.blogs) }
                    </tbody>
                </table>
            </div>
        </Authenticated>
    );
}