import Authenticated from "@/Layouts/Authenticated";
import { Head, useForm } from "@inertiajs/inertia-react";
import React from "react";
import { FloppyDisk } from 'phosphor-react';

export default function Edit(props) {
    const { data, setData, put, processing, errors } = useForm({
        'name': props.category.name,
    });

    function submit(e) {
        e.preventDefault();
        put(route('dashboard.category.update', props.category.id), {
            preserveScroll: true,
        });
    }

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header="Edit Kategori"
            headerPreAction={`Kembali`}
            headerPreActionLink={route('dashboard.category.index')}
        >
            <Head title="Edit Kategori" />

            <div className="card bg-base-100 shadow mt-4">
                <div className="card-body">
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
                                            Perbarui
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </Authenticated>
    );
}