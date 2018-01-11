function getByKeyword(list, keyword) {
  const search = keyword.trim()
  console.log(list)
  if (!search.length) return list
  return list.filter(item => item.name.indexOf(search) > -1)
}

function getByCategory(list, category) {
  if (!category) return list
  return list.filter(item => item.category === category)
}