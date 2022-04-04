import Authenticated from "@/Layouts/Authenticated";
import { Head } from "@inertiajs/inertia-react";
import React from "react";

function UserList(props) {
    return <tr className="border-y">
        <td className="border-x p-2">{props.user.id}</td>
        <td className="border-x p-2">{props.user.name}</td>
        <td className="border-x p-2">{props.user.email}</td>
        <td className="border-x p-2">
            <a
                href={props.user.show_url}
                className="transition-colors duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm"
            >
                Detail
            </a>
        </td>
    </tr>
}

export default function Index(props) {
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={
                <div className="flex justify-between items-center">
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
                    <a
                        href={props.create_url}
                        className="transition-colors duration-300 ease-in-out bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm"
                    >
                        Tambah
                    </a>
                </div>
            }
        >
            <Head title="Users" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <table className="w-full">
                                <thead className="border-x">
                                    <tr className="border-y">
                                        <th className="border-x p-2">#</th>
                                        <th className="border-x p-2">Name</th>
                                        <th className="border-x p-2">Email</th>
                                        <th className="border-x p-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {
                                        props.users.length > 0
                                            ? props.users.map(user => <UserList key={user.id} user={user} />)
                                            : <tr><td colSpan={4}>No users found.</td></tr>
                                    }
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}