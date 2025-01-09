(()=>{"use strict";const e=window.wp.blocks,t=window.wc.blocksCheckout,o=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"packeta/packeta-widget","version":"0.1.0","title":"Packeta Widget","category":"woocommerce","parent":["woocommerce/checkout-shipping-methods-block"],"attributes":{"lock":{"type":"object","default":{"remove":true,"move":true}}},"icon":"cart","description":"Packeta Widget Block","textdomain":"packeta-widget","viewScript":"file:./index.js"}'),n=window.React,i=window.wp.blockEditor,a=({children:e,buttonLabel:t,logoSrc:o,logoAlt:i,info:a,onClick:r,loading:c,placeholderText:s})=>(0,n.createElement)("div",{className:"packetery-widget-button-wrapper"},c&&(0,n.createElement)("div",{className:"packeta-widget-loading"},s),!c&&(0,n.createElement)("div",{className:"form-row packeta-widget blocks"},(0,n.createElement)("div",{className:"packetery-widget-button-row packeta-widget-button"},(0,n.createElement)("img",{className:"packetery-widget-button-logo",src:o,alt:i}),(0,n.createElement)("a",{onClick:r,className:"button alt components-button wc-block-components-button wp-element-button contained"},t)),e,a&&(0,n.createElement)("p",{className:"packeta-widget-info"},a))),r=window.wc.blocksComponents,c=window.wp.data,s=window.wc.wcSettings,l=function(e,t,o,n){for(let i in t){if(!t.hasOwnProperty(i))continue;const{name:a,widgetResultField:r,isWidgetResultField:c}=t[i];if(!1===c)continue;let s=o[r||i];n[e]=n[e]||{},n[e][a]=s}return n},d=function(e){let t=[];for(const o in e){if(!e.hasOwnProperty(o))continue;let n;n="object"==typeof e[o]?d(e[o]):e[o],t.push(o+": "+n)}return t.join(", ")},{PAYMENT_STORE_KEY:u}=window.wc.wcBlocksData,p=window.wp.i18n,{extensionCartUpdate:g}=wc.blocksCheckout,w=function(e,t){let o=null;if(t)o=t.value;else{const e=document.querySelector('input[name="radio-control-wc-payment-method-options"]:checked');null!==e&&(o=e.value)}let n=null;if(e)n=e.shippingRateId;else{let e=document.querySelectorAll('.wc-block-components-shipping-rates-control input[type="radio"]');for(let t=0;t<e.length;t++)if(e[t].checked){n=e[t].value;break}}let i={};n&&(i.shipping_method=n),o&&(i.payment_method=o),"{}"!==JSON.stringify(i)&&g({namespace:"packetery-js-hooks",data:i})};(0,e.registerBlockType)(o,{title:(0,p.__)("title","packeta"),description:(0,p.__)("description","packeta"),edit:()=>{const e=(0,i.useBlockProps)();return(0,n.createElement)("div",{...e},(0,n.createElement)(a,{buttonLabel:"Choose pickup point",logoSrc:"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDI1LjEuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IlZyc3R2YV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIKCSB2aWV3Qm94PSIwIDAgMzcgNDAiIHN0eWxlPSJmaWxsOiNhN2FhYWQiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPgoJLnN0MHtmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDtmaWxsOiAjYTdhYWFkO30KPC9zdHlsZT4KPHBhdGggY2xhc3M9InN0MCIgZD0iTTE5LjQsMTYuMWwtMC45LDAuNGwtMC45LTAuNGwtMTMtNi41bDYuMi0yLjRsMTMuNCw2LjVMMTkuNCwxNi4xeiBNMzIuNSw5LjZsLTQuNywyLjNsLTEzLjUtNmw0LjItMS42CglMMzIuNSw5LjZ6Ii8+CjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xOSwwbDE3LjIsNi42bC0yLjQsMS45bC0xNS4yLTZMMy4yLDguNkwwLjgsNi42TDE4LDBMMTksMEwxOSwweiBNMzQuMSw5LjFsMi44LTEuMWwtMi4xLDE3LjZsLTAuNCwwLjgKCUwxOS40LDQwbC0wLjUtMy4xbDEzLjQtMTJMMzQuMSw5LjF6IE0yLjUsMjYuNWwtMC40LTAuOEwwLDguMWwyLjgsMS4xbDEuOSwxNS43bDEzLjQsMTJMMTcuNiw0MEwyLjUsMjYuNXoiLz4KPHBhdGggY2xhc3M9InN0MCIgZD0iTTI4LjIsMTIuNGw0LjMtMi43bC0xLjcsMTQuMkwxOC42LDM1bDAuNi0xN2w1LjQtMy4zTDI0LjMsMjNsMy4zLTIuM0wyOC4yLDEyLjR6Ii8+CjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xNy43LDE3LjlsMC42LDE3bC0xMi4yLTExTDQuNCw5LjhMMTcuNywxNy45eiIvPgo8L3N2Zz4K",logoAlt:"Packeta",info:"Pickup Point Name"}))}}),(0,t.registerCheckoutBlock)({metadata:o,component:({cart:e})=>{const t=(e=>{const[t,o]=(0,n.useState)(null),{shippingRates:i,shippingAddress:a,cartItemsWeight:r}=e,p=(0,c.useSelect)((e=>e(u)),[]),g=(0,s.getSetting)("packeta-widget_data"),{carrierConfig:w,translations:k,logo:h,widgetAutoOpen:y,adminAjaxUrl:m}=g,b=((e,t)=>{if(!e||0===e.length)return null;const{shipping_rates:o}=e[0];if(!o||0===o.length)return null;const n=e=>o.find((({rate_id:o,selected:n})=>{if(!n)return!1;const i=o.split(":").pop(),a=t[i];return!!a&&e(a)}));return{packetaPickupPointShippingRate:n((e=>{const{is_pickup_points:t}=e;return e&&t}))||null,packetaHomeDeliveryShippingRate:n((e=>{const{is_pickup_points:t}=e;return e&&!t}))||null,chosenShippingRate:o.find((({selected:e})=>e))||null}})(i,w),{packetaPickupPointShippingRate:M=null,packetaHomeDeliveryShippingRate:f=null,chosenShippingRate:L=null}=b||{},[I,P,S]=(e=>{let[t,o]=(0,n.useState)(null),[i,a]=(0,n.useState)(!1);return(0,n.useEffect)((()=>{i||null!==t||(a(!0),fetch(e,{method:"POST",headers:{"Content-Type":"application/x-www-form-urlencoded"},body:new URLSearchParams({action:"get_settings"})}).then((e=>e.json())).then((e=>{const{isAgeVerificationRequired:t,biggestProductSize:n}=e;o((e=>({...e,isAgeVerificationRequired:t,biggestProductSize:n})))})).catch((e=>{console.error("Error:",e),o(!1)})).finally((()=>{a(!1)})))}),[t,e,i]),[t,o,i]})(m);(0,n.useEffect)((()=>{if(!I)return;const e=p.getActivePaymentMethod(),t=L?.rate_id||null;let o=!1,n=!1;(!I.shippingSaved&&t||!I.paymentSaved&&""!==e)&&(t&&(o=!0),""!==e&&(n=!0),wp.hooks.doAction("packetery_save_shipping_and_payment_methods",t,e),P({...I,shippingSaved:o,paymentSaved:n}))}),[p,L,I,P,wp]),(0,n.useEffect)((()=>{if(!I)return;const e=a.country.toLowerCase();I.lastCountry?I.lastCountry!==e&&(t&&o(null),P({...I,lastCountry:e})):P({...I,lastCountry:e})}),[I,P,t,o,a]);const C=((e,t,o,i,a,r)=>{const{carrierConfig:c,language:s,packeteryApiKey:u,appIdentity:p,nonce:g,saveSelectedPickupPointUrl:w,pickupPointAttrs:k}=t;return(0,n.useCallback)((()=>{const t=e.rate_id.split(":").pop();let n=+(r/1e3).toFixed(2),h={language:s,appIdentity:p,weight:n};h.country=a.country.toLowerCase(),c[t].carriers&&(h.carriers=c[t].carriers),c[t].vendors&&(h.vendors=c[t].vendors),o&&(o.isAgeVerificationRequired&&(h.livePickupPoint=!0),o.biggestProductSize&&(o.biggestProductSize.length&&(h.length=o.biggestProductSize.length),o.biggestProductSize.width&&(h.width=o.biggestProductSize.width),o.biggestProductSize.depth&&(h.depth=o.biggestProductSize.depth))),console.log("Pickup point widget options: apiKey: "+u+", "+d(h));let y={};Packeta.Widget.pick(u,(e=>{if(!e)return;i({pickupPoint:e}),y=l(t,k,e,y);let o=y[t];o.packetery_rate_id=t,fetch(w,{method:"POST",headers:{"Content-Type":"application/x-www-form-urlencoded","X-WP-Nonce":g},body:new URLSearchParams(o)}).then((e=>{if(!e.ok)throw new Error("HTTP error "+e.status)})).catch((e=>{console.error("Failed to save pickup point data:",e)}))}),h)}),[e,o])})(M,g,I,o,a,r),N=((e,t,o,i,a)=>{const{carrierConfig:r,language:c,packeteryApiKey:s,appIdentity:u,nonce:p,saveValidatedAddressUrl:g,homeDeliveryAttrs:w,translations:k}=t;return(0,n.useCallback)((()=>{const o=e.rate_id.split(":").pop();let n={language:c,appIdentity:u,layout:"hd"};n.country=a.country.toLowerCase(),n.street=a.address_1,n.city=a.city,n.postcode=a.postcode,n.carrierId=r[o].id,console.log("Address widget options: apiKey: "+s+", "+d(n));let h={};Packeta.Widget.pick(s,(e=>{if(!e||!e.address)return;if(e.address.country!==n.country)return void i({deliveryAddressError:t.translations.invalidAddressCountrySelected});const a=k.deliveryAddressNotification+" "+e.address.name;i({deliveryAddressInfo:a}),h=l(o,w,e.address,h);let r=h[o];r.packetery_rate_id=o,r.packetery_address_isValidated=1,fetch(g,{method:"POST",headers:{"Content-Type":"application/x-www-form-urlencoded","X-WP-Nonce":p},body:new URLSearchParams(r)}).then((e=>{if(!e.ok)throw new Error("HTTP error "+e.status)})).catch((e=>{console.error("Failed to save validated address data:",e)}))}),n)}),[e,o])})(f,g,I,o,a);(0,n.useEffect)((()=>{M&&I&&!t&&y&&C()}),[M,y,C]);const j=function(e,t){return"optional"===t||e&&e.deliveryAddressInfo?null:e&&e.deliveryAddressError?e.deliveryAddressError:k.addressIsNotValidatedAndRequiredByCarrier};let v=!0;if(M)return{buttonCallback:C,buttonLabel:k.choosePickupPoint,buttonInfo:t&&t.pickupPoint&&t.pickupPoint.name,inputValue:t&&t.pickupPoint?t.pickupPoint.name:"",inputRequired:v,errorMessage:function(e){return e&&e.pickupPoint?null:k.pickupPointNotChosen}(t),logo:h,translations:k,loading:S};if(f){const e=w[f.rate_id.split(":").pop()].address_validation||"none";return"none"===e?null:("optional"===e&&(v=!1),{buttonCallback:N,buttonLabel:k.chooseAddress,buttonInfo:t&&t.deliveryAddressInfo,inputValue:t&&t.deliveryAddressInfo?t.deliveryAddressInfo:"",inputRequired:v,errorMessage:j(t,e),logo:h,translations:k,loading:S})}return null})(e);if(null===t)return null;const{buttonCallback:o,buttonLabel:i,buttonInfo:p,inputValue:g,inputRequired:w,errorMessage:k,logo:h,translations:y,loading:m}=t;return y?(0,n.createElement)(a,{onClick:o,buttonLabel:i,logoSrc:h,logoAlt:y.packeta,info:p,loading:m,placeholderText:y.placeholderText},(0,n.createElement)(r.ValidatedTextInput,{value:g,required:w,errorMessage:k})):null}});const{extensionCartUpdate:k}=wc.blocksCheckout;wp.hooks.addAction("experimental__woocommerce_blocks-checkout-set-selected-shipping-rate","packetery-js-hooks",(function(e){w(e,null)})),wp.hooks.addAction("experimental__woocommerce_blocks-checkout-set-active-payment-method","packetery-js-hooks",(function(e){w(null,e)})),wp.hooks.addAction("experimental__woocommerce_blocks-checkout-render-checkout-form","packetery-js-hooks",(function(e){k({namespace:"packetery-js-hooks",data:{shipping_method:"n/a",payment_method:"n/a"}})})),wp.hooks.addAction("packetery_save_shipping_and_payment_methods","packetery-js-hooks",(function(e,t){w(e?{shippingRateId:e}:null,""!==t?{value:t}:null)}))})();