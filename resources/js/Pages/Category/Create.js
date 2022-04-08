import Authenticated from "@/Layouts/Authenticated";
import { Head, useForm } from "@inertiajs/inertia-react";
import React from "react";
import { FloppyDisk } from 'phosphor-react';

export default function Create(props) {
    const { data, setData, post, reset, processing, errors } = useForm({
        'name': '',
    });

    function submit(e) {
        e.preventDefault();
        post(route('dashboard.category.store'), {
            preserveScroll: true,
            onSuccess: () => reset('name'),
        });
    }

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header="Tambah Kategori"
            headerPreAction={`Kembali`}
            headerPreActionLink={route('dashboard.category.index')}
        >
            <Head title="Tambah Kategori" />

            <form onSubmit={submit}>
                <div className="grid grid-cols-12 grid-flow-row gap-4">
                    <div className="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Nama Kategori</span>
                            </label>
                            <input
                                className="input input-bordered w-full"
                                value={data.name}
                                disabled={processing}
                                onChange={e => setData('name', e.target.value) }
                            />
                            {errors.name && <p className="text-red-500 mt-2 text-sm">{errors.name}</p>}
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