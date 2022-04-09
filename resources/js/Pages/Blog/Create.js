import '@toast-ui/editor/dist/toastui-editor.css';

import Authenticated from "@/Layouts/Authenticated";
import { Head, useForm } from "@inertiajs/inertia-react";
import { React, useRef } from "react";
import { Editor } from '@toast-ui/react-editor'
import { FloppyDisk } from 'phosphor-react';

export default function Create(props) {
    const editorRef = useRef();
    const { data, setData, post, reset, processing, errors } = useForm({
        'user_id': props.auth.user.id,
        'category_id': '',
        'slug': '',
        'thumbnail': null,
        'title': '',
        'description': '',
    });

    function submit(e) {
        e.preventDefault();
        post(route('dashboard.blog.store'), {
            forceFormData: true,
            onSuccess: function() {
                reset('category_id', 'slug', 'thumbnail', 'title', 'description');
                editorRef.current.editorInst.setMarkdown('');
            },
        });
    }

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header="Tambah Blog"
            headerPreAction={`Kembali`}
            headerPreActionLink={route('dashboard.blog.index')}
        >
            <Head title="Tambah Blog" />

            <form onSubmit={submit}>
                <div className="grid grid-cols-12 grid-flow-row gap-4">
                    <div className="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Judul</span>
                            </label>
                            <input
                                className="input input-bordered w-full"
                                type="text"
                                value={data.title}
                                disabled={processing}
                                onChange={e => setData('title', e.target.value) }
                            />
                            {errors.title && <p className="text-red-500 mt-2 text-sm">{errors.title}</p>}
                        </div>
                    </div>
                    <div className="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Kategori</span>
                            </label>
                            <select
                                className="select select-bordered w-full"
                                value={data.category_id}
                                onChange={e => setData('category_id', e.target.value) }
                            >
                                <option value="">-Pilih Kategori-</option>
                                {props.categories.map(category => (
                                    <option key={category.id} value={category.id}>
                                        {category.name}
                                    </option>
                                ))}
                            </select>
                            {errors.category_id && <p className="text-red-500 mt-2 text-sm">{errors.category_id}</p>}
                        </div>
                    </div>
                    <div className="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Slug</span>
                            </label>
                            <input
                                className="input input-bordered w-full"
                                type="text"
                                value={data.slug}
                                disabled={processing}
                                onChange={e => setData('slug', e.target.value) }
                            />
                            {errors.slug && <p className="text-red-500 mt-2 text-sm">{errors.slug}</p>}
                        </div>
                    </div>
                    <div className="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Thumbnail (16:10)</span>
                            </label>
                            <input
                                className="input input-bordered w-full"
                                type="file"
                                disabled={processing}
                                onChange={e => setData('thumbnail', e.target.files[0]) }
                            />
                            {errors.thumbnail && <p className="text-red-500 mt-2 text-sm">{errors.thumbnail}</p>}
                        </div>
                    </div>
                    <div className="col-span-12">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Konten</span>
                            </label>
                            <Editor
                                hideModeSwitch={true}
                                previewStyle="vertical"
                                height="600px"
                                initialEditType="markdown"
                                useCommandShortcut={true}
                                ref={editorRef}
                                onChange={(e) => setData('description', editorRef.current.editorInst.getMarkdown())}
                            />
                            {errors.description && <p className="text-red-500 mt-2 text-sm">{errors.description}</p>}
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