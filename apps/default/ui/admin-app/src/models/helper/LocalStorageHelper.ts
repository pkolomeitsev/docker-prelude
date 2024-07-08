export class LocalStorageHelper {
  static setItem(name: string, value: any) {
    localStorage.setItem(name, JSON.stringify(value))
  }

  static getItem(name: string): any {
    return JSON.parse(localStorage.getItem(name) || JSON.stringify(''))
  }
}
