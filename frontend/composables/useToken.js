import useApiFetch from "~/composables/useApiFetch.js";

export default function useToken () {
  const createToken = async () => {
    const {data} = await useApiFetch('/api/create-token');

    return data.value;
  }

  return {
    createToken
  }
}