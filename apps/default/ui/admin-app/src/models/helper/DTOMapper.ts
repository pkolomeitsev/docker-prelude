import { AppDTO } from '../dto/AppDTO'

export class DTOMapper {
  static map(data: Partial<AppDTO>, fields?: Record<string, keyof AppDTO>) {
    const buffer: Partial<AppDTO> = {}
    for (const key in data) {
      if (fields && key in fields) {
        buffer[fields[key] as keyof AppDTO] = data[key]
        continue
      }
      buffer[key as keyof AppDTO] = data[key]
    }

    return new AppDTO(buffer.title, buffer.link, buffer.spaApp)
  }
}
