// 使用 jQuery 將 img 插入 body 中
$(function () {
    // 將 style 屬性中的 CSS 獨立出來，以便於管理
    // 初始隱藏狀態，可透過 CSS class 進行控制
    $("body").append("<img id='goTopButton' style='z-index: 5; cursor: pointer;' title='回到頂端'/>");

    // 宣告變數時，使用 const 和 let 取代 var，以符合現代 JavaScript 規範
    const img = "bntop02.png"; // 設定圖檔名稱
    const location = 0.5; // 按鈕出現在螢幕的高度
    const right = 70; // 距離右邊 PX 值
    const opacity = 0.9; // 預設透明度
    const speed = 900; // 返回 TOP 捲動速度

    // 定義 jQuery 呼叫物件
    const $button = $("#goTopButton");
    const $body = $(document);
    const $win = $(window);

    // 將圖設定到 toTopButton 的 src
    $button.attr("src", img);

    // 將 CSS 樣式集中設定，讓程式碼更乾淨
    const initialCSS = {
        "position": "fixed",
        "right": right + "px",
        // 初始設定為透明度 0，在捲動後才顯示
        "opacity": 0,
        "top": ($win.height() * location) + "px",
        // 使用 CSS transition 讓顯示/隱藏更平滑
        "transition": "opacity 0.3s ease, transform 0.3s ease"
    };
    $button.css(initialCSS);

    // 使用 debounce 函數來優化 scroll 事件，避免頻繁觸發影響效能
    const debounce = (func, delay) => {
        let timeoutId;
        return (...args) => {
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            timeoutId = setTimeout(() => {
                func(...args);
            }, delay);
        };
    };

    // 建立當網頁捲動時，呼叫自訂函數
    window.goTopMove = function () {
        // 從網頁取得與頂端離距的數值
        const scrollH = $body.scrollTop();
        const winH = $win.height();

        // 將參數設定 CSS
        const css = {
            "top": (winH * location) + "px",
            "opacity": opacity
        };

        // 如果捲動與網頁頂端超過 20PX 時，則顯示圖片，否則隱藏圖片
        if (scrollH > 20) {
            $button.css(css);
        } else {
            $button.css("opacity", 0);
        }
    };

    // 設定瀏覽器監聽兩個動作，分別為 scroll 與 resize
    // 使用 debounce 處理 scroll，讓按鈕顯示/隱藏更流暢且效能更好
    $win.on({
        scroll: debounce(goTopMove, 50),
        resize: function () {
            // resize 時立即重新計算位置，以確保按鈕位置正確
            goTopMove();
        }
    });

    // 設定瀏覽器監聽圖片三個動作
    $button.on({
        // 1. 滑鼠滑過去
        mouseover: function () {
            $button.css("opacity", 1);
        },
        // 2. 滑鼠滑出去
        mouseout: function () {
            $button.css("opacity", opacity);
        },
        // 3. 按下動作
        click: function () {
            // 點擊時的動畫效果
            $button.css({
                transform: "scale(0)",
                opacity: 0,
                // 使用 CSS transition
                transition: "transform 0.8s ease, opacity 0.8s ease"
            });

            // 回到頂端的捲動動畫
            $("html, body").animate({ scrollTop: 0 }, speed, function () {
                // 動畫完成後，將按鈕的樣式重設，以便下次捲動時能正常顯示
                $button.css({
                    transform: "none",
                    opacity: 0, // 回到頂端時按鈕是隱藏的
                    transition: "opacity 0.3s ease, transform 0.3s ease"
                });
            });
        }
    });
});