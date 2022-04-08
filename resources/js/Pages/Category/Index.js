import Authenticated from "@/Layouts/Authenticated";
import { Head, Link } from "@inertiajs/inertia-react";
import { Pencil, Trash } from 'phosphor-react';
import React from "react";

function Categories(categories) {
    if (categories.length == 0) {
        return (
            <tr className="border-y">
                <td colSpan="3" className="text-center">
                    Tidak ada kategori
                </td>
            </tr>
        );
    }

    return categories.map((category, index) => (
        <tr key={category.id} className="border-y">
            <td className="border-x">{index + 1}</td>
            <td className="border-x">{category.name}</td>
            <td className="border-x">{category.blogs_count} blog</td>
            <td className="border-x">
                <Link
                    href={ route('dashboard.category.edit', category.id) }
                    className="btn btn-success btn-sm"
                >
                    <Pencil size={16} />
                    <span className="ml-2">
                        Edit
                    </span>
                </Link>
                {
                    category.blogs_count == 0
                        ? <Link
                                as="button"
                                href={ route('dashboard.category.destroy', category.id) }
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
            header="Kategori"
            headerPostAction={`Tambah`}
            headerPostActionLink={route('dashboard.category.create')}
        >
            <Head title="Kategori" />

            <table className="table w-full mt-6">
                <thead>
                    <tr className="border-y">
                        <th className="border-x">No</th>
                        <th className="border-x">Nama Kategori</th>
                        <th className="border-x">Jumlah blog dengan kategori ini</th>
                        <th className="border-x">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    { Categories(props.categories) }
                </tbody>
            </table>
        </Authenticated>
    );
}