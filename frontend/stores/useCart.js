import {defineStore} from "pinia";
import useApiFetch from "~/composables/useApiFetch";

export const useCart = defineStore('cart', () => {
  const cartItems = ref([]);
  const totalItems = ref(0);

  const addToCart = async (product_id, gotoCart) => {
    await useApiFetch("/api/carts", {
      method: 'post',
      body: {
        product_id
      }
    })

    totalItems.value += 1;

    if (gotoCart) {
      await useRouter().push(`/cart`);
    }
  }

  const getCartItems = async (token) => {
    totalItems.value = 0;
    const {data, error} = await useApiFetch(`/api/carts?token=${token}`)

    if (error.value) {
      console.error(error.value)
      return;
    }

    cartItems.value = data.value.carts
    totalItems.value = cartItems.value.length
  }

  const removeFromCart = async (cart_id) => {
    const {error} = await useApiFetch(`/api/carts/${cart_id}`, {
      method: 'delete'
    })

    if (error.value) {
      console.error(error.value);
      return;
    }

    cartItems.value = cartItems.value.filter(item => item.id != cart_id);
    totalItems.value -= 1;
  }

  const totalItemsPhrase = computed(() => {
    return totalItems.value > 1 ? 'Items' : 'Item';
  })

  return {
    cartItems,
    totalItems,
    totalItemsPhrase,
    addToCart,
    getCartItems,
    removeFromCart
  }
});