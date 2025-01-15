/**
 * 再帰的に親ノードを探索するカスタム関数
 * @param {Object} node - 対象ノード
 * @param {Function} condition - 条件関数
 * @returns {Object|null} - 条件に一致する親ノード、または null
 */
export const findAncestor = (node, condition) => {
    let parent = node.parent;
    while (parent) {
        if (condition(parent)) {
            return parent; // 条件に一致する親ノードを返す
        }
        parent = parent.parent; // 再帰的に探索
    }
    return null; // 条件に一致する親が見つからない場合
};