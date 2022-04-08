import Authenticated from "@/Layouts/Authenticated";
import { Head, Link } from "@inertiajs/inertia-react";
import { Pencil, Trash } from 'phosphor-react';
import React from "react";

function Users(users) {
    if (users.length == 0) {
        return (
            <tr className="border-t">
                <td colSpan="3" className="text-center">
                    Tidak ada kategori
                </td>
            </tr>
        );
    }

    return users.map((user, index) => (
        <tr key={user.id} className="border-t">
            <th>{index + 1}</th>
            <td>{user.name}</td>
            <td>{user.email}</td>
            <td>{user.blogs_count} blog</td>
            <td>{user.comments_count} komentar</td>
            <td>
                <Link
                    href={ route('dashboard.user.edit', user.id) }
                    className="btn btn-success btn-sm"
                >
                    <Pencil size={16} />
                    <span className="ml-2">
                        Edit
                    </span>
                </Link>
                {
                    user.blogs_count == 0 && user.comments_count == 0
                        ? <Link
                                as="button"
                                href={ route('dashboard.user.destroy', user.id) }
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
            header="Pengguna"
            headerPostAction={`Tambah`}
            headerPostActionLink={route('dashboard.user.create')}
        >
            <Head title="Pengguna" />

            <div className="overflow-x-auto">
                <table className="table table-compact w-full mt-6">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jumlah Blog</th>
                            <th>Jumlah Komentar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        { Users(props.users) }
                    </tbody>
                </table>
            </div>
        </Authenticated>
    );
}