import Authenticated from "@/Layouts/Authenticated";
import { Head } from "@inertiajs/inertia-react";
import React from "react";

export default function Show(props) {
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={
                <div className="flex justify-between items-center">
                    <a
                        href={props.back_url}
                        className="transition-colors duration-300 ease-in-out bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm"
                    >
                        Kembali
                    </a>
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">Detail User: { props.user.name }</h2>
                </div>
            }
        >
            <Head title={ "Detail User: " + props.user.name } />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <table>
                                <tbody>
                                    <tr>
                                        <td className="px-2 py-1">ID</td>
                                        <td className="px-2 py-1">:</td>
                                        <td className="px-2 py-1">{ props.user.id }</td>
                                    </tr>
                                    <tr>
                                        <td className="px-2 py-1">Nama</td>
                                        <td className="px-2 py-1">:</td>
                                        <td className="px-2 py-1">{ props.user.name }</td>
                                    </tr>
                                    <tr>
                                        <td className="px-2 py-1">Email</td>
                                        <td className="px-2 py-1">:</td>
                                        <td className="px-2 py-1">{ props.user.email }</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}