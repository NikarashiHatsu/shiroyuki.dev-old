import CustomLayout from "@/Layouts/CustomLayout";
import React from "react";

const PersistentPage2 = () => {
    return (
        <>
            <h1 className="text-3xl mb-4">Welcome to Persistent Page 2</h1>
            <p className="mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis odio vitae justo sollicitudin, quis euismod ex auctor. Nunc gravida urna tristique dui volutpat pretium. Cras faucibus metus et diam dictum blandit. Nunc nec arcu odio. Nam a nisl non enim malesuada pellentesque tempus a orci. Donec mollis ultricies nibh, eget placerat sem. Proin faucibus elit enim, eu dignissim eros dapibus vitae. Aliquam feugiat a odio et cursus. Nullam eget placerat diam. Fusce eu diam facilisis, eleifend massa non, convallis quam. Aliquam erat volutpat. Phasellus consequat lacus et molestie mattis. Maecenas ullamcorper pulvinar diam, interdum elementum lacus gravida id. Fusce a eleifend erat, a lacinia dui. Nam sed tellus lacus.
            </p>
            <p className="mb-4">
                Vestibulum rhoncus tortor quis nunc pharetra, sit amet tempor neque rhoncus. Curabitur dictum magna est. Vivamus felis augue, imperdiet ornare ultrices vel, accumsan quis ex. Nunc cursus mollis lacus vel tempus. Donec et mauris laoreet, mollis lacus tincidunt, placerat mi. Integer tincidunt nulla ac dui pharetra dictum. Aliquam gravida mattis orci eget pharetra. Nulla non ex posuere, gravida magna quis, molestie sem. Sed ultrices in tellus a ultricies. Sed aliquet lobortis enim, sit amet fermentum neque pulvinar quis. Ut faucibus aliquet odio, a condimentum justo. Donec sed odio ipsum.
            </p>
            <p className="mb-4">
                Maecenas ipsum tellus, bibendum eu diam sed, posuere dignissim neque. Cras ullamcorper leo quis neque sollicitudin lacinia. Integer sit amet diam a quam egestas efficitur a a quam. Cras vehicula purus a luctus tempus. Nunc blandit, ipsum ut lobortis rutrum, urna velit bibendum ante, eget consequat nulla mauris at ligula. Donec aliquam nibh magna. Donec nec venenatis magna, nec mollis risus. Quisque eget eros scelerisque, tincidunt libero eget, tempor purus. Nullam egestas lobortis ipsum, id posuere tellus pellentesque eget.
            </p>
            <p className="mb-4">
                Aliquam sollicitudin lacus leo, nec hendrerit ante aliquam eget. Duis aliquam nulla vel tempus fringilla. Nunc bibendum nunc libero, vel efficitur lacus faucibus vel. Nullam magna libero, porta ac risus volutpat, placerat luctus nulla. Duis quis sagittis nisi. Ut magna ante, fermentum in lectus at, iaculis porta odio. Donec dignissim id nulla eget facilisis. Duis elementum tempor lorem, vel scelerisque dui iaculis eget. Cras dictum velit eu enim ornare sagittis. Nullam sit amet enim ut turpis dapibus efficitur nec at nibh. Aenean vitae consequat lectus. Suspendisse id egestas arcu, eget feugiat erat. Morbi vel nisl augue. Sed eu erat ligula. Morbi eu neque augue. Morbi ultrices quam quis egestas consequat.
            </p>
            <p className="mb-4">
                Nulla nec aliquam diam. Cras quis aliquet diam. Morbi varius sit amet neque in lobortis. Suspendisse sodales nisl sit amet eros sodales gravida. Integer placerat justo ac purus dignissim, id molestie felis malesuada. Curabitur quis imperdiet metus. Morbi elit eros, volutpat non ullamcorper ac, dapibus sed enim. Integer vitae mauris eros.
            </p>
        </>
    );
}

PersistentPage2.layout = page => <CustomLayout children={page} />

export default PersistentPage2