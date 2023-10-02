export default function useApiFetch (path, options) {
  return useFetch(`http://localhost:8000${path}`, {
    credentials: "include",
    ...options
  })
}