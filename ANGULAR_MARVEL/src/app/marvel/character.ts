export interface Character {
  type: String;
  favorite: boolean;
  id: number;
  name: String;
  description: string;
  modified: Date;
  resourceURI: string
  urls: {
    type: string;
    url: string;
  }[];
  thumbnail: {
    path: string;
    extension: string
  };
  comics: {
    available: number;
    returned: number;
    collectionURI: string;
    items: {
      resourceURI: string;
      name: string;
    }[];
  };
  stories: {
    available: number;
    returned: number;
    collectionURI: string;
    items: { resourceURI: string; name: string; type: string; }[]
  };
  events: {
    available: number;
    returned: number;
    collectionURI: string;
    items: { resourceURI: string; name: string; type: string; }[]
  };
  series: {
    available: number;
    returned: number;
    collectionURI: string;
    items: { resourceURI: string; name: string; type: string; }[]
  };
}
