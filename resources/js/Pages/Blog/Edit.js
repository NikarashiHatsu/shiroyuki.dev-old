import '@toast-ui/editor/dist/toastui-editor.css';

import Authenticated from "@/Layouts/Authenticated";
import { Head, useForm } from "@inertiajs/inertia-react";
import { React, useRef } from "react";
import { Editor } from '@toast-ui/react-editor'
import { FloppyDisk } from 'phosphor-react';
import { Inertia } from '@inertiajs/inertia';

export default function Edit(props) {
    const editorRef = useRef();
    const { data, setData, processing, errors } = useForm({
        'category_id': props.blog.category_id,
        'thumbnail': props.blog.thumbnail_url,
        'title': props.blog.title,
        'slug': props.blog.slug,
        'description': props.blog.description,
    });

    function submit(e) {
        e.preventDefault();
        Inertia.post(route('dashboard.blog.update', props.blog.id), {
            _method: 'PUT',
            forceFormData: true,
            category_id: data.category_id,
            thumbnail: data.thumbnail,
            title: data.title,
            slug: data.slug,
            description: data.description,
        });
    }

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header="Edit Blog"
            headerPreAction={`Kembali`}
            headerPreActionLink={route('dashboard.blog.index')}
        >
            <Head title="Edit Blog" />

            <form onSubmit={submit}>
                <div className="grid grid-cols-12 grid-flow-row gap-4">
                    <div className="col-span-12">
                        <div className="form-group max-w-xs">
                            <label className="label">
                                <span className="label-text">Thumbnail saat ini</span>
                            </label>
                            <div className="aspect-w-16 aspect-h-10">
                                <a href={props.blog.thumbnail_url} target="_blank">
                                    <img
                                        className="w-full h-full border rounded object-cover"
                                        src={props.blog.thumbnail_url}
                                    />
                                </a>
                            </div>
                        </div>
                    </div>
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
                                disabled={true}
                                onChange={e => setData('slug', e.target.value) }
                            />
                            {errors.slug && <p className="text-red-500 mt-2 text-sm">{errors.slug}</p>}
                        </div>
                    </div>
                    <div className="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div className="form-group">
                            <label className="label">
                                <span className="label-text">Thumbnail (16:10) (Tidak diubah)</span>
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
                                initialValue={props.blog.description}
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
                                    Perbarui
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </Authenticated>
    );
}