import React from 'react';
import Guest from '@/Layouts/Guest';
import Post from '@/Components/Post';

import DummyPostThumbnail1 from './../../images/post_dummies/mac2022.jpg';
import DummyPostThumbnail2 from './../../images/post_dummies/code.jpg';
import DummyPostThumbnail3 from './../../images/post_dummies/rails.jpg';
import DummyPostThumbnail4 from './../../images/post_dummies/android.jpg';
import DummyPostThumbnail5 from './../../images/post_dummies/flutter.jpg';

export default function Welcome(children) {
    return (
        <Guest>
            <div className='grid grid-cols-12 grid-flow-row gap-4'>
                <div className='col-span-12 sm:col-span-6 md:col-span-4'>
                    <Post
                        author="Hatsu Shiroyuki"
                        title="Mac 2022. Lebih tipis, lebih ringan, dan lebih kuat!"
                        formattedDate="8 April 2022"
                        thumbnail={DummyPostThumbnail1}
                        description="Curabitur fermentum cursus blandit. Nam lacinia fringilla erat, vulputate congue ipsum hendrerit ac. Duis ut imperdiet diam. Aliquam ac leo fringilla, convallis ligula quis, tristique tellus. Quisque volutpat mattis sodales. Vivamus laoreet feugiat leo id faucibus. Phasellus volutpat laoreet dolor quis euismod. Morbi quis rutrum augue, sed viverra quam. Phasellus mattis sem dolor, at ornare dolor ultricies scelerisque. Praesent dolor lectus, gravida at quam quis, imperdiet hendrerit orci."
                    />
                </div>
                <div className='col-span-12 sm:col-span-6 md:col-span-4'>
                    <Post
                        author="Hatsu Shiroyuki"
                        title="10 hal yang wajib diketahui programmer PHP di tahun 2022"
                        formattedDate="7 April 2022"
                        thumbnail={DummyPostThumbnail2}
                        description="Curabitur fermentum cursus blandit. Nam lacinia fringilla erat, vulputate congue ipsum hendrerit ac. Duis ut imperdiet diam. Aliquam ac leo fringilla, convallis ligula quis, tristique tellus. Quisque volutpat mattis sodales. Vivamus laoreet feugiat leo id faucibus. Phasellus volutpat laoreet dolor quis euismod. Morbi quis rutrum augue, sed viverra quam. Phasellus mattis sem dolor, at ornare dolor ultricies scelerisque. Praesent dolor lectus, gravida at quam quis, imperdiet hendrerit orci."
                    />
                </div>
                <div className='col-span-12 sm:col-span-6 md:col-span-4'>
                    <Post
                        author="Hatsu Shiroyuki"
                        title="Laravel, Ruby on Rails, atau Simfony? Berikut hal yang harus Anda ketahui sebelum memulai pengembangan menggunakan framework ini."
                        formattedDate="6 April 2022"
                        thumbnail={DummyPostThumbnail3}
                        description="Curabitur fermentum cursus blandit. Nam lacinia fringilla erat, vulputate congue ipsum hendrerit ac. Duis ut imperdiet diam. Aliquam ac leo fringilla, convallis ligula quis, tristique tellus. Quisque volutpat mattis sodales. Vivamus laoreet feugiat leo id faucibus. Phasellus volutpat laoreet dolor quis euismod. Morbi quis rutrum augue, sed viverra quam. Phasellus mattis sem dolor, at ornare dolor ultricies scelerisque. Praesent dolor lectus, gravida at quam quis, imperdiet hendrerit orci."
                    />
                </div>
                <div className='col-span-12 sm:col-span-6 md:col-span-4'>
                    <Post
                        author="Hatsu Shiroyuki"
                        title="Pengembangan Android, haruskah Anda memahami Java atau Kotlin sepenuhnya?"
                        formattedDate="5 April 2022"
                        thumbnail={DummyPostThumbnail4}
                        description="Curabitur fermentum cursus blandit. Nam lacinia fringilla erat, vulputate congue ipsum hendrerit ac. Duis ut imperdiet diam. Aliquam ac leo fringilla, convallis ligula quis, tristique tellus. Quisque volutpat mattis sodales. Vivamus laoreet feugiat leo id faucibus. Phasellus volutpat laoreet dolor quis euismod. Morbi quis rutrum augue, sed viverra quam. Phasellus mattis sem dolor, at ornare dolor ultricies scelerisque. Praesent dolor lectus, gravida at quam quis, imperdiet hendrerit orci."
                    />
                </div>
                <div className='col-span-12 sm:col-span-6 md:col-span-4'>
                    <Post
                        author="Hatsu Shiroyuki"
                        title="Flutter. Masa depan pengembangan multi-platform, atau kehancuran platform-specific development?"
                        formattedDate="4 April 2022"
                        thumbnail={DummyPostThumbnail5}
                        description="Curabitur fermentum cursus blandit. Nam lacinia fringilla erat, vulputate congue ipsum hendrerit ac. Duis ut imperdiet diam. Aliquam ac leo fringilla, convallis ligula quis, tristique tellus. Quisque volutpat mattis sodales. Vivamus laoreet feugiat leo id faucibus. Phasellus volutpat laoreet dolor quis euismod. Morbi quis rutrum augue, sed viverra quam. Phasellus mattis sem dolor, at ornare dolor ultricies scelerisque. Praesent dolor lectus, gravida at quam quis, imperdiet hendrerit orci."
                    />
                </div>
            </div>
        </Guest>
    );
}
