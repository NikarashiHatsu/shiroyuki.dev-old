import CustomLayout from "@/Layouts/CustomLayout";
import React from "react";

const PersistentPage1 = () => {
    return (
        <>
            <h1 className="text-3xl mb-4">Welcome to Persistent Page 1</h1>
            <p className="mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget ligula odio. Duis ut rutrum mi. Nullam ut mi non lorem ullamcorper condimentum. Pellentesque turpis augue, tincidunt accumsan neque at, tristique condimentum sem. Morbi non enim eget elit dignissim malesuada a a ligula. Pellentesque volutpat, velit ac vestibulum rutrum, mi elit facilisis dui, in pulvinar erat mi id nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis et ante sit amet justo venenatis hendrerit. Vestibulum volutpat eget turpis et tempus. Donec at aliquam leo.
            </p>
            <p className="mb-4">
                Sed rhoncus finibus sapien, ut aliquet orci imperdiet eget. Proin fermentum molestie odio vitae lacinia. Fusce euismod, purus eu convallis volutpat, tellus mauris bibendum odio, vitae tincidunt diam diam sit amet erat. Fusce vel est a felis scelerisque semper. Morbi auctor porttitor ligula, sed gravida odio tempus sit amet. Vestibulum non faucibus risus. Nullam tincidunt elit id nisi imperdiet varius. Suspendisse arcu enim, tincidunt eu libero vitae, pretium porttitor orci. Fusce vel semper justo. Etiam gravida ac est sed rutrum. Ut ultrices condimentum augue, sit amet tempor ligula sollicitudin id. Etiam faucibus, tellus a iaculis condimentum, diam eros pulvinar diam, ac facilisis nunc urna et nunc. Pellentesque ante ante, pellentesque eu orci ac, faucibus blandit lectus. Quisque sollicitudin mauris non scelerisque faucibus. Ut vitae massa leo.
            </p>
            <p className="mb-4">
                Fusce volutpat, magna non tempus fringilla, odio mauris dapibus urna, nec eleifend erat tortor a odio. Maecenas nisl quam, mattis quis ullamcorper nec, volutpat eu elit. Vestibulum viverra porta est at sagittis. Fusce ex sapien, facilisis ultrices egestas sit amet, feugiat a velit. Nam imperdiet dolor sed eros lobortis laoreet. Suspendisse sed quam ac odio feugiat pharetra id sit amet purus. Etiam maximus augue ut elementum dignissim. Nam maximus, ipsum et hendrerit gravida, magna odio auctor nunc, eu mollis tellus erat id tellus. Praesent quis luctus dui. Pellentesque fermentum, tortor ut fermentum ullamcorper, ipsum velit dapibus felis, quis dignissim erat dolor sit amet elit.
            </p>
            <p className="mb-4">
                Donec odio tellus, fermentum et ipsum id, tristique pharetra lorem. Sed sit amet eros enim. Nulla id viverra turpis. Etiam non imperdiet nulla, at molestie massa. Phasellus convallis suscipit dui, ut accumsan nunc elementum vitae. Maecenas tempor dui eget urna congue convallis nec ac purus. Cras vitae urna in libero maximus maximus vel eget ante. Proin nisi arcu, vulputate non semper at, ornare a mi. Praesent eget nibh venenatis magna scelerisque aliquet nec sed nisi. Vestibulum ac dui nibh. Nunc eu nunc quis sem aliquam fermentum sed ac lorem. Cras imperdiet, libero id efficitur dapibus, quam tortor tempor erat, nec tincidunt neque massa vitae urna. Integer diam nibh, pharetra nec blandit ultricies, venenatis in erat.
            </p>
            <p className="mb-4">
                In convallis aliquet nisi in rutrum. Aenean rhoncus ante id auctor efficitur. In vestibulum nisi ac nunc elementum sodales. Etiam in ex pellentesque, dignissim lacus in, dapibus metus. In eu urna non tortor porttitor mollis sed eget arcu. Donec tincidunt justo sed velit luctus, non aliquam quam fermentum. Nam tincidunt lorem est, ac faucibus lectus dictum et. Duis vehicula malesuada magna id interdum. Vestibulum varius ligula ex. Integer pellentesque, quam at maximus vulputate, enim odio tincidunt risus, vestibulum venenatis elit quam et tortor. Pellentesque at ex posuere eros consequat lobortis vel sed tellus. Aenean consectetur augue eu viverra placerat.
            </p>
        </>
    );
}

PersistentPage1.layout = page => <CustomLayout children={page} />

export default PersistentPage1