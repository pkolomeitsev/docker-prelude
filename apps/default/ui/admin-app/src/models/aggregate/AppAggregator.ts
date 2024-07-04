import { AppDTO } from '../dto/AppDTO'
import { DTOMapper } from '../helper/DTOMapper'

export class AppAggregator {
  apps: Array<AppDTO> = []

  constructor() {}

  addApps(apps: Array<any>) {
    for (const key in apps) {
      this.apps.push(DTOMapper.map(apps[key], { url: 'link' }))
    }
  }

  getApps() {
    return this.apps
  }
}
