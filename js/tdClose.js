document.addEventListener("DOMContentLoaded", () => {
    let source = '';
    if (window.location.pathname.includes('index.php')) {
        source = 'index';
    } else if (window.location.pathname.includes('mypage.php')) {
        source = 'mypage';
    }

    console.log(`Fetching imgsize.php?source=${source}`); // Debug log

    fetch(`imgsize.php?source=${source}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Received data:', data); // Debug log

            if (source === 'index') {
                for (const user in data) {
                    const imagesData = data[user];
                    applyImageSizes(imagesData);
                }
            } else if (source === 'mypage') {
                applyImageSizes(data);
                handleFragmentScroll();
            }
        })
        .catch(error => console.error('Error loading images:', error));

    function handleFragmentScroll() {
        const fragmentParts = window.location.hash.split('#');
        const encodedFragment = fragmentParts[1]; // エンコードされたフラグメント識別子
        const fragment = decodeURIComponent(encodedFragment);

        if (!fragment) return; // フラグメント識別子が指定されていない場合は処理を終了する

        const cell = document.getElementById(fragment);
        if (!cell) return; // IDに対応する要素が存在しない場合は処理を終了する

        const mado = document.getElementById("mado").clientHeight;
        const header = document.querySelector("header").clientHeight;
        const th = document.querySelector("th").clientHeight;

        // スクロール位置を決定する
        const topPosition = cell.getBoundingClientRect().top + window.scrollY - (mado + header + th);
        window.scrollTo({ top: topPosition });

        // 全てのinfoセルの背景色をリセット
        const infoCells = document.querySelectorAll("td.info");
        infoCells.forEach(cell => {
            cell.style.backgroundColor = "";
        });

        // クリックされたセルの背景色を変更
        cell.parentElement.nextElementSibling.nextElementSibling.firstElementChild.style.backgroundColor = "rgb(250,180,60)";
    }    const YandO = document.querySelectorAll("td.YandO");

    const info = document.querySelectorAll("td.info");
    const img = document.querySelectorAll("td.img");
    const caption = document.querySelectorAll("td.caption");

    // td.YandOがクリックされた場合の処理
    YandO.forEach(yando => {
        yando.addEventListener("click", (e) => {
            handleCellClick(e.target);
        });
    });

    // td.infoに指定されたIDがフラグメント識別子になっている場合の処理
    /* info.forEach(cell => {
        const id = cell.getAttribute("id");
        if (id) {
            const fragmentParts = window.location.hash.split('#');
            const encodedFragment = fragmentParts[1]; // エンコードされたフラグメント識別子
            const fragment = decodeURIComponent(encodedFragment);

            if (fragment === id) {
                const mado = document.getElementById("mado").clientHeight;
                const header = document.querySelector("header").clientHeight;
                const th = document.querySelector("th").clientHeight;

                // offsetをoffset2に設定
                let offset = mado + header + th;

                console.log("mado:", mado);
                console.log("header:", header);
                console.log("th:", th);
                console.log("offset:", offset);

                // requestAnimationFrameでスクロール位置を決定する
                requestAnimationFrame(() => {
                    const rect = cell.getBoundingClientRect();
                    const topPosition = cell.getBoundingClientRect().top + window.scrollY - offset;
                    console.log("rect.top:", rect.top);
                    console.log("window.scrollY:", window.scrollY);
                    console.log("topPosition:", topPosition);
                    window.scrollTo({ top: topPosition });

                    // 全てのinfoセルの背景色をリセット
                    info.forEach(cell => {
                        cell.style.backgroundColor = "";
                    });

                    // クリックされたセルの背景色を変更
                    cell.parentElement.nextElementSibling.nextElementSibling.firstElementChild.style.backgroundColor = "rgb(250,180,60)";
                });
            }
        }
    }); */

    function handleCellClick(clickedCell) {
        const mado = document.getElementById("mado").clientHeight;
        const header = document.querySelector("header").clientHeight;
        const th = document.querySelector("th").clientHeight;

        // info, img, captionの表示/非表示を切り替える
        info.forEach(cell => {
            cell.style.display = cell.style.display === "none" ? "table-cell" : "none";
        });
        img.forEach(cell => {
            cell.style.display = cell.style.display === "none" ? "table-cell" : "none";
        });
        caption.forEach(cell => {
            cell.style.display = cell.style.display === "none" ? "table-cell" : "none";
        });

        const tdinfo = clickedCell.parentElement.previousElementSibling.previousElementSibling.clientHeight;
        const tdimg = clickedCell.parentElement.previousElementSibling.clientHeight;
        let offset1 = mado + header + th + tdinfo + tdimg;
        let offset2 = mado + header + th;

        let offset = (info[0].style.display === "table-cell") ? offset1 : offset2;

        // スクロール位置を決定する
        const topPosition = clickedCell.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: topPosition });

        // 全てのYandOセルの背景色をリセット
        YandO.forEach(cell => {
            cell.style.backgroundColor = "";
        });

        // クリックされたセルの背景色を変更
        clickedCell.style.backgroundColor = "rgb(250,180,60)";
    }

    function applyImageSizes(imagesData) {
        if (Array.isArray(imagesData)) {
            imagesData.forEach(imageData => {
                const images = document.querySelectorAll('td.img img');
                images.forEach(img => {
                    if (img.src.includes(imageData.src)) {
                        img.width = imageData.width;
                        img.height = imageData.height;
                    }
                });
            });
        } else {
            const userKeys = Object.keys(imagesData);
            userKeys.forEach(userKey => {
                const imageDataArray = imagesData[userKey];
                imageDataArray.forEach(imageData => {
                    const images = document.querySelectorAll('td.img img');
                    images.forEach(img => {
                        if (img.src.includes(imageData.src)) {
                            img.width = imageData.width;
                            img.height = imageData.height;
                        }
                    });
                });
            });
        }
    }
});
