import Authenticated from "@/Layouts/Authenticated";
import { Head, useForm } from "@inertiajs/inertia-react";
import React from "react";
import { FloppyDisk } from 'phosphor-react';

export default function Create(props) {
    const { data, setData, post, reset, processing, errors } = useForm({
        'name': '',
        'email': '',
        'password': '',
        'password_confirmation': '',
    });

    function submit(e) {
        e.preventDefault();
        post(route('dashboard.user.store'), {
            preserveScroll: true,
            onSuccess: () => reset('name', 'email', 'password', 'password_confirmation'),
        });
    }

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header="Tambah Pengguna"
            headerPreAction={`Kembali`}
            headerPreActionLink={route('dashboard.user.index')}
        >
            <Head title="Tambah Pengguna" />

            <form onSubmit={submit}>
                <div className="grid grid-cols-12 grid-flow-row gap-4">
                    <div className="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Nama Pengguna</span>
                            </label>
                            <input
                                className="input input-bordered w-full"
                                type="text"
                                value={data.name}
                                disabled={processing}
                                onChange={e => setData('name', e.target.value) }
                            />
                            {errors.name && <p className="text-red-500 mt-2 text-sm">{errors.name}</p>}
                        </div>
                    </div>
                    <div className="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Email Pengguna</span>
                            </label>
                            <input
                                className="input input-bordered w-full"
                                type="email"
                                value={data.email}
                                disabled={processing}
                                onChange={e => setData('email', e.target.value) }
                            />
                            {errors.email && <p className="text-red-500 mt-2 text-sm">{errors.email}</p>}
                        </div>
                    </div>
                    <div className="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Password</span>
                            </label>
                            <input
                                className="input input-bordered w-full"
                                type="password"
                                value={data.password}
                                disabled={processing}
                                onChange={e => setData('password', e.target.value) }
                            />
                            {errors.password && <p className="text-red-500 mt-2 text-sm">{errors.password}</p>}
                        </div>
                    </div>
                    <div className="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Konfirmasi Password</span>
                            </label>
                            <input
                                className="input input-bordered w-full"
                                type="password"
                                value={data.password_confirmation}
                                disabled={processing}
                                onChange={e => setData('password_confirmation', e.target.value) }
                            />
                        </div>
                    </div>
                    <div className="col-span-12">
                        <div className="flex justify-end">
                            <button
                                disabled={processing}
                                className="btn btn-primary"
                            >
                                <FloppyDisk size={16} />
                                <span className="ml-2">
                                    Tambah
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </Authenticated>
    );
}