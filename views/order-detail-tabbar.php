<div class="order-detail-status card">
    <div class="d-flex flex-row justify-content-between align-items-center">
        <div class="order-detail-status-item <?= $order->status >= WAIT_CONFIRM_STATUS ? 'current' : '' ?>">
            <div class="order-detail-status-item-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none" class="injected-svg" data-src="/assets/images/icons/package-box.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M7.40692 11.3465L20.5779 4.304L16.0004 2L2.41992 8.836L7.40692 11.3465Z" fill="#D23F57"></path>
                    <path d="M24.5773 6.3175L11.4062 13.36L15.9998 15.6725L29.5803 8.83601L24.5773 6.3175Z" fill="#D23F57"></path>
                    <path d="M15.625 16.3275L11 13.9995V19.1145L9 17.101H7V11.986L2 9.46948V23.1415L15.625 30V16.3275Z" fill="#D23F57"></path>
                    <path d="M16.375 16.3275V30L30 23.1415V9.46948L16.375 16.3275Z" fill="#D23F57"></path>
                </svg>
            </div>
            <?php if ($order->status >= WAIT_CONFIRM_STATUS): ?>
                <div class="order-detail-status-item-check">
                    <div class="AvatarStyle__StyledAvatar-sc-1tfjtzs-0 hJJJZK">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" class="injected-svg" data-src="/assets/images/icons/done.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g clip-path="url(#clip0-28)">
                                <path d="M11.7212 1.96136C11.3499 1.58959 10.747 1.58982 10.3752 1.96136L4.31744 8.01936L1.62503 5.32697C1.25325 4.95519 0.650609 4.95519 0.278832 5.32697C-0.0929441 5.69874 -0.0929441 6.30139 0.278832 6.67316L3.6442 10.0385C3.82997 10.2243 4.07357 10.3174 4.31718 10.3174C4.5608 10.3174 4.80463 10.2245 4.9904 10.0385L11.7212 3.30753C12.0929 2.93602 12.0929 2.33311 11.7212 1.96136Z" fill="#33D067"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0-28">
                                    <rect width="12" height="12" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>
            <span class="order-detail-status-item-text">Chờ xác nhận</span>
        </div>

        <div class="order-detail-status-divider <?= $order->status >= WAIT_DELIVERY_STATUS ? 'current' : '' ?>"></div>
        <div class="order-detail-status-item <?= $order->status >= WAIT_DELIVERY_STATUS ? 'current' : '' ?>">
            <div class="order-detail-status-item-icon">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
                    <g>
                        <circle cx="144" cy="432" r="48" fill="#D23F57"/>
                        <circle cx="384" cy="432" r="48" fill="#D23F57"/>
                        <path d="m151.125,205.313l48,32c2.727,1.82 5.813,2.688 8.859,2.688 5.172,0 10.242-2.5 13.328-7.125 4.898-7.352 2.914-17.289-4.438-22.188l-40.874-27.25v-39.438c0-8.836-7.164-16-16-16s-16,7.164-16,16v48c0.117,0 0.182,0 0.296-0.002 0.009,5.162 2.213,10.238 6.829,13.315z" fill="#D23F57"/>
                        <path d="M507.438,255.539l-48-80C453.656,165.898,443.242,160,432,160H320v-32c0-17.672-14.328-32-32-32h-0.304   C258.472,57.225,212.186,32,160,32S61.528,57.225,32.304,96H32c-17.672,0-32,14.328-32,32v288c0,17.672,14.328,32,32,32h33.612   C64.563,442.828,64,437.48,64,432c0-44.184,35.817-80,80-80s80,35.816,80,80c0,5.48-0.563,10.828-1.612,16H288h16v-16   c0-44.184,35.817-80,80-80s80,35.816,80,80v16h16c17.672,0,32-14.328,32-32V272C512,266.203,510.422,260.508,507.438,255.539z    M160,96c52.938,0,96,43.063,96,96s-43.063,96-96,96s-96-43.063-96-96S107.063,96,160,96z M448,288h-96v-16v-64h64l32,64V288z" fill="#D23F57"/>
                    </g>
                </svg>
            </div>
            <?php if ($order->status >= WAIT_DELIVERY_STATUS): ?>
                <div class="order-detail-status-item-check">
                    <div class="AvatarStyle__StyledAvatar-sc-1tfjtzs-0 hJJJZK">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" class="injected-svg" data-src="/assets/images/icons/done.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g clip-path="url(#clip0-28)">
                                <path d="M11.7212 1.96136C11.3499 1.58959 10.747 1.58982 10.3752 1.96136L4.31744 8.01936L1.62503 5.32697C1.25325 4.95519 0.650609 4.95519 0.278832 5.32697C-0.0929441 5.69874 -0.0929441 6.30139 0.278832 6.67316L3.6442 10.0385C3.82997 10.2243 4.07357 10.3174 4.31718 10.3174C4.5608 10.3174 4.80463 10.2245 4.9904 10.0385L11.7212 3.30753C12.0929 2.93602 12.0929 2.33311 11.7212 1.96136Z" fill="#33D067"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0-28">
                                    <rect width="12" height="12" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>
            <span class="order-detail-status-item-text">Chờ giao hàng</span>
        </div>

        <div class="order-detail-status-divider <?= $order->status >= DELIVERING_STATUS ? 'current' : '' ?>"></div>
        <div class="order-detail-status-item <?= $order->status >= DELIVERING_STATUS ? 'current' : '' ?>">
            <div class="order-detail-status-item-icon">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="32px" height="32px" viewBox="0 0 612 612"
                     xml:space="preserve">
                    <g>
                        <path d="M612,327.56v-21.606c0-10.533-4.213-20.628-11.701-28.037L484.107,162.958c-7.384-7.306-17.352-11.403-27.739-11.403
                            h-58.622v-21.988c0-16.336-13.243-29.58-29.58-29.58H29.58C13.243,99.987,0,113.23,0,129.567V327.56H612z M432.551,190.303
                            c0-2.563,2.071-4.634,4.635-4.634h21.396c1.184,0,2.366,0.494,3.253,1.282l91.006,86.865c3.057,2.86,0.986,7.987-3.154,7.987
                            h-112.5c-2.563,0-4.635-2.07-4.635-4.634V190.303z M612,343.903v65.486c0,16.336-13.243,29.578-29.579,29.578h-31.65
                            c-5.719-39.242-39.539-69.412-80.357-69.412c-40.721,0-74.54,30.17-80.259,69.412h-160.42
                            c-5.718-39.242-39.538-69.412-80.259-69.412c-40.721,0-74.541,30.17-80.259,69.412H29.58C13.243,438.968,0,425.726,0,409.39
                            v-65.486H612z M470.456,389.313c-33.883,0-61.351,27.467-61.351,61.35s27.469,61.35,61.351,61.35s61.35-27.467,61.35-61.35
                            S504.339,389.313,470.456,389.313z M470.456,481.339c-16.941,0-30.675-13.734-30.675-30.676s13.732-30.674,30.675-30.674
                            c16.941,0,30.676,13.732,30.676,30.674S487.397,481.339,470.456,481.339z M149.464,389.313c-33.883,0-61.35,27.467-61.35,61.35
                            s27.468,61.35,61.35,61.35s61.35-27.467,61.35-61.35S183.346,389.313,149.464,389.313z M149.464,481.339
                            c-16.941,0-30.676-13.734-30.676-30.676s13.734-30.674,30.676-30.674c16.941,0,30.675,13.732,30.675,30.674
                            S166.405,481.339,149.464,481.339z" fill="#D23F57"/>
                    </g>
                </svg>
            </div>
            <?php if ($order->status >= DELIVERING_STATUS): ?>
                <div class="order-detail-status-item-check">
                    <div class="AvatarStyle__StyledAvatar-sc-1tfjtzs-0 hJJJZK">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" class="injected-svg" data-src="/assets/images/icons/done.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g clip-path="url(#clip0-28)">
                                <path d="M11.7212 1.96136C11.3499 1.58959 10.747 1.58982 10.3752 1.96136L4.31744 8.01936L1.62503 5.32697C1.25325 4.95519 0.650609 4.95519 0.278832 5.32697C-0.0929441 5.69874 -0.0929441 6.30139 0.278832 6.67316L3.6442 10.0385C3.82997 10.2243 4.07357 10.3174 4.31718 10.3174C4.5608 10.3174 4.80463 10.2245 4.9904 10.0385L11.7212 3.30753C12.0929 2.93602 12.0929 2.33311 11.7212 1.96136Z" fill="#33D067"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0-28">
                                    <rect width="12" height="12" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>
            <span class="order-detail-status-item-text">Đang giao hàng</span>
        </div>

        <div class="order-detail-status-divider <?= $order->status >= COMPLETED_STATUS ? 'current' : '' ?>"></div>
        <div class="order-detail-status-item <?= $order->status >= COMPLETED_STATUS ? 'current' : '' ?>">
            <div class="order-detail-status-item-icon">
                <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 505 511.62">
                    <path d="m336.11 39.84-115.38 68.94 135.38 18.4 111.32-69.44-131.32-17.9zm26.72 204.57c73.79 0 133.6 59.82 133.6 133.61 0 73.78-59.81 133.6-133.6 133.6-73.79 0-133.6-59.82-133.6-133.6 0-73.79 59.81-133.61 133.6-133.61zm-34.4 114.76 19.91 18.66 45.73-46.46c4.46-4.53 7.28-8.18 12.79-2.51l17.88 18.33c5.88 5.81 5.58 9.22.04 14.62l-66.23 65.01c-11.66 11.46-9.64 12.15-21.48.41l-38.75-38.52c-2.47-2.68-2.19-5.37.51-8.06l20.75-21.52c3.15-3.3 5.64-3.02 8.85.04zm-123.6-233.04-.09 141.71-51.45-35.04-51.46 29.07 6.1-148.91-88.54-12.03v312.98l178.95 23.14c2.52 7.09 5.47 13.98 8.85 20.62L9.3 432.08c-5.17-.21-9.3-4.48-9.3-9.69V89.86c.27-4.05 1.89-6.89 5.72-8.81L182.48.85c1.58-.72 3.52-1.01 5.25-.77l308.18 42.04c5.09.59 8.58 4.77 8.58 9.99v.02L505 280.9c-5.72-8.46-15.57-20.29-19.93-27.77V69.56l-115.81 74.93v59.81a174.846 174.846 0 0 0-19.39.36v-58.82l-145.04-19.71zm-81.52-30.58 112.17-69.44-47.58-6.49L44.24 84.8l79.07 10.75z" fill="#D23F57"/>
                </svg>
            </div>
            <?php if ($order->status >= COMPLETED_STATUS): ?>
                <div class="order-detail-status-item-check">
                    <div class="AvatarStyle__StyledAvatar-sc-1tfjtzs-0 hJJJZK">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" class="injected-svg" data-src="/assets/images/icons/done.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g clip-path="url(#clip0-28)">
                                <path d="M11.7212 1.96136C11.3499 1.58959 10.747 1.58982 10.3752 1.96136L4.31744 8.01936L1.62503 5.32697C1.25325 4.95519 0.650609 4.95519 0.278832 5.32697C-0.0929441 5.69874 -0.0929441 6.30139 0.278832 6.67316L3.6442 10.0385C3.82997 10.2243 4.07357 10.3174 4.31718 10.3174C4.5608 10.3174 4.80463 10.2245 4.9904 10.0385L11.7212 3.30753C12.0929 2.93602 12.0929 2.33311 11.7212 1.96136Z" fill="#33D067"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0-28">
                                    <rect width="12" height="12" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>
            <span class="order-detail-status-item-text">Đã hoàn thành</span>
        </div>

        <div class="order-detail-status-divider <?= $order->status >= CANCELLED_STATUS ? 'current' : '' ?>"></div>
        <div class="order-detail-status-item <?= $order->status >= CANCELLED_STATUS ? 'current' : '' ?>">
            <div class="order-detail-status-item-icon">
                <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 505 511.62">
                    <path d="m336.11 39.84-115.38 68.94 135.38 18.4 111.32-69.44-131.32-17.9zm26.88 204.87c73.71 0 133.45 59.75 133.45 133.45 0 73.71-59.74 133.46-133.45 133.46-73.7 0-133.45-59.75-133.45-133.46 0-73.7 59.75-133.45 133.45-133.45zm-51.43 110.32c-4.28-4.21-7.71-6.85-2.36-12.04l17.25-16.83c5.47-5.54 8.68-5.26 13.76-.04l23.26 23.25 23.12-23.11c4.2-4.28 6.84-7.69 12.03-2.36l16.84 17.26c5.54 5.47 5.26 8.68.03 13.77l-23.23 23.23 23.23 23.24c5.23 5.09 5.51 8.3-.03 13.76l-16.84 17.27c-5.19 5.33-7.83 1.9-12.03-2.37l-23.12-23.11-23.26 23.26c-5.08 5.21-8.29 5.49-13.76-.04l-17.25-16.85c-5.35-5.17-1.92-7.81 2.36-12.03l23.12-23.13-23.12-23.13zm-106.73-228.9-.09 141.71-51.45-35.04-51.46 29.07 6.1-148.91-88.54-12.03v312.98l178.95 23.14c2.52 7.09 5.47 13.98 8.85 20.62L9.3 432.08c-5.17-.21-9.3-4.48-9.3-9.69V89.86c.27-4.05 1.89-6.89 5.72-8.81L182.48.85c1.58-.72 3.52-1.01 5.25-.77l308.18 42.04c5.09.59 8.58 4.77 8.58 9.99v.02L505 280.9c-5.72-8.46-15.57-20.29-19.93-27.77V69.56l-115.81 74.93v59.81a174.846 174.846 0 0 0-19.39.36v-58.82l-145.04-19.71zm-81.52-30.58 112.17-69.44-47.58-6.49L44.24 84.8l79.07 10.75z" fill="#D23F57"/>
                </svg>
            </div>
            <?php if ($order->status >= CANCELLED_STATUS): ?>
                <div class="order-detail-status-item-check">
                    <div class="AvatarStyle__StyledAvatar-sc-1tfjtzs-0 hJJJZK">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" class="injected-svg" data-src="/assets/images/icons/done.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g clip-path="url(#clip0-28)">
                                <path d="M11.7212 1.96136C11.3499 1.58959 10.747 1.58982 10.3752 1.96136L4.31744 8.01936L1.62503 5.32697C1.25325 4.95519 0.650609 4.95519 0.278832 5.32697C-0.0929441 5.69874 -0.0929441 6.30139 0.278832 6.67316L3.6442 10.0385C3.82997 10.2243 4.07357 10.3174 4.31718 10.3174C4.5608 10.3174 4.80463 10.2245 4.9904 10.0385L11.7212 3.30753C12.0929 2.93602 12.0929 2.33311 11.7212 1.96136Z" fill="#33D067"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0-28">
                                    <rect width="12" height="12" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>
            <span class="order-detail-status-item-text">Đã hủy</span>
        </div>
    </div>

    <div class="cancel-reason-box">
        <div class="cancel-reason-text <?= $order->status != CANCELLED_STATUS || empty($order->cancel_reason) ? 'd-none' : '' ?>">
            <strong>Lý do hủy:</strong>
            <?= $order->cancel_reason ?>
        </div>
    </div>
</div>